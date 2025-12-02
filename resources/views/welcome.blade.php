<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mangás</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    xintegrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <style>
        body {
            background-color: #121212 !important; 
        }
        /* Estilo dos Inputs para combinar com o dark mode */
        .form-control, .form-select {
            background-color: #343a40; 
            color: #ffffff;
            border: 1px solid #495057;
            /* Garante que o select e input tenham a mesma altura */
            height: calc(2.25rem + 2px); 
        }
        .form-control:focus, .form-select:focus {
            background-color: #343a40;
            color: #ffffff;
            border-color: #0d6efd;
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
        }
        /* Estilo para a barra de progresso */
        .progress-bar {
            background-color: #0d6efd;
        }
    </style>
</head>

<body class="bg-dark">

    <nav class="navbar navbar-expand-lg shadow" style="background-color: #212529;">
        <div class="container-fluid">
            <a class="navbar-brand h1 text-white mx-auto" style="font-size: 2rem !important;" href="{{ route('manga.index') }}">
                <strong>Mangá List</strong>
            </a>
        </div>
    </nav>

    <div class="container mt-4">
        
        <!-- EXIBIÇÃO DE MENSAGENS FLASH (SUCESSO) -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Título do Formulário -->
        <h4 class="text-white mb-3 border-bottom pb-2">Adicionar Novo Mangá:</h4>

        <!-- FORMULÁRIO HORIZONTAL (Campo 'lidos' removido) -->
        <form method="POST" action="{{ route('manga.store') }}" class="row g-3 align-items-end mb-5 p-3 rounded" style="background-color: #212529; border: 1px solid #343a40;">
            @csrf
            
            <!-- 1. Nome do Mangá (Agora ocupa 5 colunas) -->
            <div class="col-md-5">
                <label for="manga_name" class="form-label text-white">Nome do Mangá:</label>
                <input type="text" class="form-control" id="manga_name" name="manga_name" placeholder="Dragon Ball" required value="{{ old('manga_name') }}">
                @error('manga_name') <div class="text-danger small">{{ $message }}</div> @enderror
            </div>  

            <!-- 2. Volumes Totais (Agora ocupa 3 colunas) -->
            <div class="col-md-3">
                <label for="volumes" class="form-label text-white">Volumes Totais:</label>
                <input type="number" class="form-control" id="volumes" name="volumes" placeholder="10" required value="{{ old('volumes') }}">
                @error('volumes') <div class="text-danger small">{{ $message }}</div> @enderror
            </div>

            <!-- 3. Status (Agora ocupa 2 colunas) -->
            <div class="col-md-2">
                <label for="status" class="form-label text-white">Status</label>
                <select id="status" name="status" class="form-select" required>
                    <option value="" selected disabled>Escolha...</option>
                    <option value="Lendo" @if(old('status') == 'Lendo') selected @endif>Lendo</option>
                    <option value="Dropei" @if(old('status') == 'Dropei') selected @endif>Dropei</option>
                    <option value="Finalizado" @if(old('status') == 'Finalizado') selected @endif>Finalizado</option>
                    <option value="Planejo Ler" @if(old('status') == 'Planejo Ler') selected @endif>Planejo Ler</option>
                </select> 
                @error('status') <div class="text-danger small">{{ $message }}</div> @enderror
            </div>

            <!-- Botão -->
            <div class="col-md-2 d-grid">
                <button type="submit" class="btn btn-success btn-block">
                    <i class="fas fa-plus-circle me-1"></i> Inserir
                </button>
            </div>
        </form>
        
        <!-- LISTAGEM DE MANGÁS (TABELA) -->
        <div class="mt-5">
            <h2 class="text-white border-bottom pb-2 mb-4">Sua Coleção</h2>

            @if(!empty($manga) && $manga->count() > 0)
                <div class="table-responsive">
                    <table class="table table-dark table-striped table-hover rounded-3 overflow-hidden">
                        <thead>
                            <tr>
                                <!-- ORDEM SOLICITADA: ID, Nome, Volumes (lidos/total), Status, Ações -->
                                <th scope="col">ID</th>
                                <th scope="col">Nome</th>
                                <th scope="col" class="text-center">Volumes</th>
                                <th scope="col">Status</th>
                                <th scope="col" class="text-center">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($manga as $manga)
                            <tr>
                                <!-- ID -->
                                <th scope="row">{{ $manga->id }}</th>

                                <!-- NOME -->
                                <td>{{ $manga->manga_name }}</td>

                                <!-- VOLUMES (LIDOS/TOTAL) + BARRA DE PROGRESSO -->
                                <td class="text-center">
                                    {{ $manga->lidos }} / {{ $manga->volumes }}
                                    @php
                                        // Calcula a porcentagem, evitando divisão por zero
                                        $progresso = $manga->volumes > 0 ? ($manga->lidos / $manga->volumes) * 100 : 0;
                                        $progresso = min(100, $progresso);
                                    @endphp
                                    <div class="progress mt-1" style="height: 5px;">
                                        <div class="progress-bar" role="progressbar" style="width: {{ $progresso }}%;" aria-valuenow="{{ $progresso }}" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </td>

                                <!-- STATUS -->
                                <td>
                                    <!-- Estilo para destacar o status com badges -->
                                    <span class="badge {{ 
                                        $manga->status == 'Finalizado' ? 'bg-success' : (
                                        $manga->status == 'Lendo' ? 'bg-primary' : (
                                        $manga->status == 'Dropei' ? 'bg-danger' : 'bg-secondary'
                                    )) }}">
                                        {{ $manga->status }}
                                    </span>
                                </td>

                                <!-- AÇÕES (Botões Editar e Excluir) -->
                                <td class="text-center">
                                    <!-- BOTÃO EDITAR -->
                                    <a class="btn btn-sm btn-info text-white me-2" title="Editar">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    <!-- BOTÃO EXCLUIR (usando formulário DELETE) -->
                                    <form method="POST" action= "{{ route('manga.destroy', $manga->id) }}"  style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <!-- Confirmação de exclusão (Atenção: use Modal customizado em produção) -->
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir {{ $manga->manga_name }}?')" title="Excluir">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <!-- Placeholder se não houver dados -->
                <div class="p-5 text-center text-muted rounded" style="background-color: #212529; border: 1px dashed #495057;">
                    <i class="fas fa-list-alt fa-3x mb-3" style="color: #495057;"></i>
                    <p class="mb-0">Nenhum mangá encontrado. Use o formulário acima para começar a adicionar!</p>
                </div>
            @endif
        </div>

    </div> 
 
    <!-- Scripts de Bootstrap e Font Awesome -->
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        xintegrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js" crossorigin="anonymous"></script>

</body>
</html>