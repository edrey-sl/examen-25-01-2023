<?php 

require_once('../conexion/conexion.php');

$idAlumno = $_GET['idAlumno'];
$idMateria = $_GET['idMateria'];

$eliminar = "DELETE FROM `cat_rel_alumno_materia` WHERE iCodigoAlumno = $idAlumno AND vchCodigoMateria = '$idMateria'";
$sentencia = $pdo->prepare($eliminar);
$sentencia->execute();

if ($sentencia->rowCount() > 0)
{
    header('Location: ../inscritas.php');
    
}else{
    echo '<script>
      window.alert("Error al eliminar");
    </script>';
   
}
?>