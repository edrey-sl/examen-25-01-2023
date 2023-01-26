<?php
require_once('../conexion/conexion.php');

$calf = $_POST['calf'];
$codigoAlumno = $_POST['codigo'];
$codigoMateria = $_POST['codigoMateria'];


$existeRegistro = "SELECT * FROM cat_rel_alumno_materia WHERE iCodigoAlumno = $codigoAlumno AND vchCodigoMateria = '$codigoMateria'";
   $validador = $pdo->prepare($existeRegistro);
   $validador->execute();
   $validador->rowCount();

   if($validador->rowCount() > 0) {

    $update = $pdo->prepare("UPDATE cat_rel_alumno_materia 
    SET 
        fCalificacion = :fCalificacion
       
    WHERE iCodigoAlumno = :idAlumno AND vchCodigoMateria = :idMateria");
    
    $update->bindParam(':fCalificacion', $calf);
    $update->bindParam(':idAlumno', $codigoAlumno);
    $update->bindParam(':idMateria', $codigoMateria);
    $update->execute();
    
    if ($update->rowCount() > 0){
        echo json_encode('exito');
    }
    else{
        echo json_encode('error');
    }

      } else {

    echo json_encode('noexiste');
   }
