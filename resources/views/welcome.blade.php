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
    </style>
  </head>
  
  <body class="bg-dark">

      <nav class="navbar navbar-expand-lg shadow" style="background-color: #212529;">
          <div class="container-fluid">
            <a class="navbar-brand h1 text-white mx-auto" style="font-size: 2rem !important;" href="#">
                <strong>Mangá List</strong>
            </a>
          </div>
      </nav>

      <div class="container mt-4">
            <!-- Título do Formulário -->
            <h4 class="text-white mb-3 border-bottom pb-2">Adicionar Novo Volume:</h4>

            <!-- FORMULÁRIO HORIZONTAL -->
            <form method="POST" action="{{ route('manga.store') }}" class="row g-3 align-items-end mb-5 p-3 rounded" style="background-color: #212529; border: 1px solid #343a40;">
                @csrf
                <!-- 1. Nome do Mangá -->
                <div class="col-md-5">
                    <label for="manga_name" class="form-label text-white">Nome do Mangá:</label>
                    <input type="text" class="form-control" id="manga_name" name="manga_name" placeholder="Dragon Ball">
                </div>  

                <!-- 2. Quantidade de Páginas -->
                <div class="col-md-2">
                    <label for="qtd_pg" class="form-label text-white">Páginas:</label>
                    <input type="number" class="form-control" id="qtd_pg" name="qtd_pg" placeholder="145">
                </div>
                
                <!-- 3. Status -->
                <div class="col-md-3">
                    <label for="status" class="form-label text-white">Status</label>
                    <select id="status" name="status" class="form-select">
                        <option selected>Escolha...</option>
                        <option>Lendo</option>
                        <option>Dropei</option>
                        <option>Finalizado</option>
                        <option>Planejo Ler</option>
                    </select> 
                </div>

                <!-- Botão -->
                <div class="col-md-2 d-grid">
                    <button type="submit" class="btn btn-success btn-block">
                        <i class="fas fa-plus-circle me-1"></i> Inserir
                    </button>
                </div>
            </form>
            
            <!-- ÁREA PARA LISTAGEM DE MANGÁS -->
            <div class="mt-5">
                <h2 class="text-white border-bottom pb-2 mb-4">Sua Coleção</h2>
                
                <!-- Placeholder para a Tabela/Cards da lista -->
                <div class="p-5 text-center text-muted rounded" style="background-color: #212529; border: 1px dashed #495057;">
                    <i class="fas fa-list-alt fa-3x mb-3" style="color: #495057;"></i>
                    <p class="mb-0">Este é o espaço reservado para a listagem dos seus mangás.</p>
                    <p class="mb-0">Aqui você irá construir a tabela ou os cards de exibição.</p>
                </div>
            </div>

      </div> 
  

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      xintegrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js" crossorigin="anonymous"></script>

  </body>
</html>