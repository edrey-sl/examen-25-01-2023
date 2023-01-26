<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET,POST");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


require_once('../conexion/conexion.php');


if (isset($_GET["alumno"])) {

    $codigo = $_GET["alumno"];
    $alumno = "SELECT iCodigoAlumno As codigo, vchNombres AS nombre, vchApellidos As apellidos, dtFechaNac AS fecha_nacimiento FROM `cat_alumnos` WHERE iCodigoAlumno = $codigo";
    $sentencia = $pdo->prepare($alumno);
    $sentencia->execute();

    if ($sentencia) {
        $arreglo = $sentencia->fetch(PDO::FETCH_ASSOC);
    } else {
        $arreglo = 'false';
    }
    echo json_encode($arreglo);
    exit();
}


if (isset($_GET["materias"])) {

    $codigo = $_GET["materias"];
    $alumno = "SELECT vchCodigoMateria AS codigoMateria, vchMateria AS nombre FROM `cat_materias` WHERE vchCodigoMateria = '$codigo'";
    $sentencia = $pdo->prepare($alumno);
    $sentencia->execute();

    if ($sentencia) {
        $arreglo = $sentencia->fetch(PDO::FETCH_ASSOC);
    } else {
        $arreglo = 'false';
    }
    echo json_encode($arreglo);
    exit();
}


$codigo = $_GET['codigo'];
$datos = "SELECT cat_rel_alumno_materia.iCodigoAlumno AS codigoAlumno, cat_alumnos.vchNombres AS nombre, cat_alumnos.vchApellidos AS apellidos, cat_alumnos.dtFechaNac As nacimiento, cat_materias.vchCodigoMateria AS codigoMateria, cat_materias.vchMateria AS nombreMateria, cat_rel_alumno_materia.fCalificacion AS calificacion FROM `cat_rel_alumno_materia` INNER JOIN cat_alumnos ON cat_rel_alumno_materia.iCodigoAlumno = cat_alumnos.iCodigoAlumno INNER JOIN cat_materias ON cat_materias.vchCodigoMateria = cat_rel_alumno_materia.vchCodigoMateria WHERE cat_rel_alumno_materia.iCodigoAlumno = $codigo";
$sentencia = $pdo->prepare($datos);
$sentencia->execute();

if ($sentencia->rowCount() <= 0) {
    $arreglo = 'error';
} else {
    $arreglo = $sentencia->fetchAll(PDO::FETCH_ASSOC);
}
echo json_encode($arreglo);
