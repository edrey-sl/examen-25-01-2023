<?php
require_once('php/recursos.php');

$listaMateria = listaMaterias();
?>
<!doctype html>
<html lang="es">

<head>
  <title>Examen</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

  <link rel="stylesheet" href="css/estilos.css">

</head>

<body>

  <div class="container">
    <a href="./" class="btn btn-primary mt-5">Regresar</a>
    <h1 class="text-center mt-5 mb-3">Materias</h1>

  
      <h2 class="my-3">Buscar</h2>
      <form id="form-consulta-materia">
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <input type="text" name="codigo" placeholder="Introduce: Código de materia" class="form-control input-lg">

            </div>
            <div id="mensaje"></div>
          </div>

          <div class="col-md-4">
            <div class="form-group">
              <input type="submit" class="btn btn-primary" value="Buscar">
            </div>
          </div>
        </div>
      </form>
      
      <div id="tablaMateria" class="mt-5"></div>
  
  </div>


  <footer>
    <!-- place footer here -->
  </footer>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>

  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="js/materia.js" type="module"></script>

</body>

</html>