<?php
require_once("../Conexion/conexion.php");
if (!empty($_POST["btnRegistrar"])) {
    if (!empty($_POST["alumn_DNI"]) && !empty($_POST["nombre"]) && !empty($_POST["apellido"]) && !empty($_POST["fecha_nac"])) {
        $viejo_DNI=$_POST["viejo_DNI"];
        $alumn_DNI = $_POST["alumn_DNI"];
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $fecha_nac = $_POST["fecha_nac"];
        try{$BD = Conexion::connect();
            $query = "UPDATE alumno SET alumn_DNI = ?, nombre = ?, apellido = ?, fecha_nac = ? WHERE alumn_DNI = ?";
            $stmt = $BD->prepare($query);
            $stmt->bind_param("ssssi", $alumn_DNI, $nombre, $apellido, $fecha_nac, $viejo_DNI);
            $stmt->execute();
            if ($stmt->execute()){
                header("location:insertAlumno.php");
            }else{
                echo "<div class='alert alert-warning'>Campos vacios</div>";
            }
        } catch (mysqli_sql_exception $e) {
    die("Error: " . $e->getMessage());
}
    }
}
?>