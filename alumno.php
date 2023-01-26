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
    <h1 class="text-center mt-5 mb-3">Alumnos</h1>

    <div class="my-5">
      <h2 class="my-3">Buscar</h2>
      <form id="form-consulta">
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <input type="text" name="codigo" placeholder="Introduce: Código del alumno" class="form-control input-lg">

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


      <div id="tablaAlum" class="mt-5"></div>

      <!-- Modal -->
      <div class="modal fade" id="modalMateria" tabindex="-1" aria-labelledby="modalMateriaLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalMateriaLabel">Asignar Materia</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form id="formAgregarMateria">
                <input type="hidden" name="codigoalumno" id="codigoAlumno">
                <div class="form-group">
                  <select name="codigoMateria" required class="form-select form-select-lg mb-3" aria-label=".form-select-lg">

                    <option selected>Seleccionar</option>
                    <?php foreach ($listaMateria as $Lista) :  ?>
                      <option value="<?php echo $Lista['codigoMateria'] ?>"><?php echo $Lista['nombreMateria'] ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>

                <div id="mensajeMateria"></div>

                <input type="submit" class="btn btn-primary" value="Guardar">
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Salir</button>

            </div>
          </div>
        </div>
      </div>


    </div>
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
  <script src="js/app.js" type="module"></script>

</body>

</html>