<?php
require_once('../conexion/conexion.php');
 	
  $codAlumno = $_POST['codigoalumno'];
  $codMateria = $_POST['codigoMateria'];


   $existeRegistro = "SELECT * FROM cat_rel_alumno_materia WHERE iCodigoAlumno = $codAlumno AND vchCodigoMateria = '$codMateria'";
   $validador = $pdo->prepare($existeRegistro);
   $validador->execute();
   $validador->rowCount();

   if($validador->rowCount() > 0) {

    echo json_encode('existe');

   } else {
   
    $sentencia = $pdo->prepare("INSERT INTO cat_rel_alumno_materia(iCodigoAlumno,vchCodigoMateria) 
    VALUES (:iCodigoAlumno, :vchCodigoMateria)");
     $sentencia->bindParam(':iCodigoAlumno', $codAlumno);
     $sentencia->bindParam(':vchCodigoMateria', $codMateria);
    
     $sentencia->execute();
 
            if ($sentencia->rowCount() > 0) {
                echo json_encode('exito');
            } else {
                echo json_encode('error');
            }
   }
   


?>