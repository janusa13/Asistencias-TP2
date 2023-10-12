<?php
include ('../Conexion/conexion.php');
require_once('Alumno.php');
$alumn_DNI = $_GET["alumn_DNI"];
try {
    $BD = Conexion::connect();

    $querySelect = 'SELECT asistencias FROM alumno WHERE alumn_DNI = ?';
    $stmtSelect = $BD->prepare($querySelect);
    $stmtSelect->bind_param("i", $alumn_DNI);
    $stmtSelect->execute();
    $result = $stmtSelect->get_result();
    $row = $result->fetch_assoc();
    $asistencias = $row["asistencias"];
    $asistencias += 1;
    $queryUpdate = 'UPDATE alumno SET asistencias = ? WHERE alumn_DNI = ?'; 
    $stmtUpdate = $BD->prepare($queryUpdate);
    $stmtUpdate->bind_param("ii", $asistencias, $alumn_DNI);
    $stmtUpdate->execute();
    if ($stmtUpdate->execute()){
        header("location:../home.php");
    }
} catch (mysqli_sql_exception $e) {
    die("Error: " . $e->getMessage());
}
?>
