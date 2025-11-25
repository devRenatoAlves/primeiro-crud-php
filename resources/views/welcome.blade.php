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
        .card-form {
            background-color: #212529;
            border: 1px solid #343a40;
            border-radius: 0.75rem;
            padding: 2rem;
        }
        .form-control, .form-select {
            background-color: #343a40;
            color: #ffffff;
            border: 1px solid #495057;
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

      <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-8"> 
                    <div class="card-form shadow-lg">
                        <h3 class="text-white text-center mb-4 border-bottom pb-2">Cadastro de Volume</h3>

                        <form>
                            <div class="mb-3">
                                <label for="manga_name" class="form-label text-white">Nome do Mangá:</label>
                                <input type="text" class="form-control" id="manga_name" placeholder="Dragon Ball">
                            </div>  

                            <div class="mb-3">
                                <label for="qtd_pg" class="form-label text-white">Quantidade de Páginas:</label>
                                <input type="number" class="form-control" id="qtd_pg" placeholder="145">
                            </div>
                            
                            <div class="mb-4">
                                <label for="inputState" class="form-label text-white">Status</label>
                                <select id="inputState" class="form-select">
                                    <option selected>Escolha...</option>
                                    <option>Lendo</option>
                                    <option>Dropei</option>
                                    <option>Finalizado</option>
                                    <option>Planejo Ler</option>
                                </select> 
                            </div>

                            <div class="d-grid">
                                <button type="button" class="btn btn-success btn-lg">
                                    <i class="fas fa-save me-2"></i> Inserir
                                </button>
                            </div>
                        </form>
                    </div>
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