<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Mangá</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    xintegrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <style>
        body {
            background-color: #121212 !important; 
        }
        .form-control, .form-select {
            background-color: #343a40; 
            color: #ffffff;
            border: 1px solid #495057;
            height: calc(2.25rem + 2px); 
        }
        .form-control:focus, .form-select:focus {
            background-color: #343a40;
            color: #ffffff;
            border-color: #0d6efd;
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
        }
        /* Cor do placeholder para inputs preenchidos */
        .form-control::placeholder {
            color: #adb5bd;
        }
    </style>
</head>

<body class="bg-dark">

    <nav class="navbar navbar-expand-lg shadow" style="background-color: #212529;">
        <div class="container-fluid">
            <a class="navbar-brand h1 text-white mx-auto" style="font-size: 2rem !important;" href="{{ route('manga.index') }}">
                <strong>Edição</strong>
            </a>
        </div>
    </nav>

    <div class="container mt-5">
        
        <div class="card p-4 mx-auto shadow-lg" style="max-width: 700px; background-color: #212529; border: 1px solid #343a40;">
            <div class="card-header border-bottom border-secondary mb-3 pb-2">
                <h4 class="text-white m-0">Editar: <span class="text-primary">{{ $manga->manga_name }}</span></h4>
            </div>

            <!-- FORMULÁRIO DE EDIÇÃO -->
            <!-- action aponta para a rota UPDATE com o ID do mangá -->
            <form method="POST" action="{{ route('manga.update', $manga->id) }}">
                @csrf
                @method('PUT') <!-- Importante para rotas de atualização -->
                
                <div class="row g-3">
                    
                    <!-- 1. Nome do Mangá -->
                    <div class="col-md-12">
                        <label for="manga_name" class="form-label text-white">Nome do Mangá:</label>
                        <!-- O input abaixo usa old() para manter o valor em caso de erro -->
                        <input type="text" class="form-control" id="manga_name" name="manga_name" required 
                               value="{{ old('manga_name', $manga->manga_name) }}">
                        @error('manga_name') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                    </div>  

                    <!-- 2. Volumes Totais -->
                    <div class="col-md-6">
                        <label for="volumes" class="form-label text-white">Volumes Totais:</label>
                        <input type="number" class="form-control" id="volumes" name="volumes" required 
                               value="{{ old('volumes', $manga->volumes) }}">
                        @error('volumes') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                    </div>

                    <!-- 3. Volumes Lidos (CAMPO NOVO PARA EDIÇÃO) -->
                    <div class="col-md-6">
                        <label for="lidos" class="form-label text-white">Volumes Lidos:</label>
                        <input type="number" class="form-control" id="lidos" name="lidos" required 
                               value="{{ old('lidos', $manga->lidos) }}">
                        @error('lidos') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                    </div>

                    <!-- 4. Status -->
                    <div class="col-md-12">
                        <label for="status" class="form-label text-white">Status</label>
                        <select id="status" name="status" class="form-select" required>
                            @php $statusAtual = old('status', $manga->status); @endphp
                            <option value="Lendo" @if($statusAtual == 'Lendo') selected @endif>Lendo</option>
                            <option value="Dropei" @if($statusAtual == 'Dropei') selected @endif>Dropei</option>
                            <option value="Finalizado" @if($statusAtual == 'Finalizado') selected @endif>Finalizado</option>
                            <option value="Planejo Ler" @if($statusAtual == 'Planejo Ler') selected @endif>Planejo Ler</option>
                        </select> 
                        @error('status') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-12 mt-4 d-flex justify-content-between">
                        <a href="{{ route('manga.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left me-1"></i> Voltar
                        </a>
                        <button type="submit" class="btn btn-primary px-4">
                            <i class="fas fa-save me-1"></i> Salvar Alterações
                        </button>
                    </div>

                </div>
            </form>
        </div>
    </div> 
 
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js" crossorigin="anonymous"></script>

</body>
</html>