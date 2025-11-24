<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mangás</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
  
  <body class="bg-dark">

      <nav class="navbar navbar-expand-lg shadow">
          <div  class="container-fluid bg-secondary rounded">
            <a class="navbar-brand h1 text-white mx-auto display-1" style="font-size: 2rem !important;" href="#"><strong>Mangá List</strong></a>
          <div>
      </nav>

      <form>

      <div class="form-group col-md-4">
        <label for="formGroupExampleInput">Nome do Mangá:</label>
        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Dragon Ball">
      </div>  

      <div class="form-group col-md-4">
        <label for="formGroupExampleInput2">Quantidade de Páginas:</label>
        <input type="number" class="form-control" id="formGroupExampleInput2" placeholder="145">
      </div>

      <div class="form-group col-md-4">
      <label for="inputState">Status</label>
        <select id="inputState" class="form-control">
          <option selected>Escolha...</option>
          <option>Lendo</option>
          <option>Dropei</option>
          <option>Finalizado</option>
          <option>Planejo Ler</option>
        </select>
      </div>

    </form>


    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>

  </body>
</html>