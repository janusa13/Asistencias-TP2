<?php
include("..\Conexion\conexion.php");
$BD = Conexion::connect();
$alumn_DNI = $_GET["alumn_DNI"];
$delete_materia_Query = "DELETE FROM alumno_materia WHERE alumno_fk= ?";
$delete_materia_Form = mysqli_prepare($BD, $delete_materia_Query);
mysqli_stmt_bind_param($delete_materia_Form, "i", $alumno_fk);
mysqli_stmt_execute($delete_materia_Form);

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
