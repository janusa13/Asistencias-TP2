<?php
include("..\Conexion\conexion.php");
$BD = Conexion::connect();
$alumn_DNI = $_GET["alumn_DNI"];
$deleteQuery = "DELETE FROM alumno WHERE alumn_DNI= ?";
$deleteForm = mysqli_prepare($BD, $deleteQuery);
mysqli_stmt_bind_param($deleteForm, "i", $alumn_DNI);
mysqli_stmt_execute($deleteForm);
if ($deleteForm) {
    header("Location: insertAlumno.php"); 
    exit; 
} else {
    echo "no anduvo";
}
?>