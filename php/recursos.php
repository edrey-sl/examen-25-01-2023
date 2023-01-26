<?php 

 function listaMaterias(){
 require_once('conexion/conexion.php');
 $materias = "SELECT vchCodigoMateria As codigoMateria, vchMateria As nombreMateria FROM `cat_materias`";
 $sentencia = $pdo->prepare($materias);
 $sentencia->execute();

 return $lista = $sentencia->fetchAll(PDO::FETCH_ASSOC);
}
