<?php
require_once("../Conexion/conexion.php");
if (!empty($_POST["btnRegistrar"])) {
    if (!empty($_POST["alumn_DNI"]) && !empty($_POST["nombre"]) && !empty($_POST["apellido"]) && !empty($_POST["fecha_nac"])) {
        $viejo_DNI=$_POST["viejo_DNI"];
        $alumn_DNI = $_POST["alumn_DNI"];
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $fecha_nac = $_POST["fecha_nac"];
        $query = "UPDATE alumno SET alumn_DNI = :nuevo_alumn_DNI, nombre = :nombre, apellido = :apellido, fecha_nac = :fecha_nac WHERE alumn_DNI = :viejo_DNI";
        $stmt = $connect->prepare($query);
        $stmt->bindParam(":nuevo_alumn_DNI", $alumn_DNI);
        $stmt->bindParam(":nombre", $nombre);
        $stmt->bindParam(":apellido", $apellido);
        $stmt->bindParam(":fecha_nac", $fecha_nac);
        $stmt->bindParam(":viejo_DNI", $_POST["viejo_DNI"]);
        $stmt->execute();
        if ($stmt->execute()){
            header("location:insertAlumno.php");
        } 
    }else{
        echo "<div class='alert alert-warning'>Campos vacios</div>";
    }
}
?>