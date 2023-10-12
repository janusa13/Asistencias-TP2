<?php
include("../Conexion/conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $BD = Conexion::connect();
        $alumn_DNI = $_POST["alumn_DNI"];
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $fecha_nac = $_POST["fecha_nac"];
        if ($alumn_DNI && $nombre && $apellido && $fecha_nac != NULL) {
            $check_query = "SELECT COUNT(*) FROM alumno WHERE alumn_DNI = ?";
            $check_stmt = $BD->prepare($check_query);
            $check_stmt->bind_param("s", $alumn_DNI);
            $check_stmt->execute();
            $check_stmt->bind_result($num_rows);
            $check_stmt->fetch();
            $check_stmt->close();

            if ($num_rows == 0) {
                $query = "INSERT INTO alumno(alumn_DNI, nombre, apellido, fecha_nac) 
                VALUES (?, ?, ?, ?)";
                $stmt = $BD->prepare($query);
                $stmt->bind_param("ssss", $alumn_DNI, $nombre, $apellido, $fecha_nac); 
                $stmt->execute();
                header("location:insertAlumno.php");
            } else {
                print("DATOS YA EXISTENTES");
            }
        } else {
            print("DATOS VACIOS");
        }
    } catch (Exception $e) {
        print("Error: " . $e->getMessage());
    }
}
?>