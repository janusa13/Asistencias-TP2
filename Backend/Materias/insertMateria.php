<?php
include("../Conexion/conexion.php");
$msg_err = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $BD = Conexion::connect();
        $nombre = $_POST["nombre"];
        $profesor_FK = $_POST["profesor_FK"];
        if ($nombre && $profesor_FK != NULL) {
            $check_query = "SELECT COUNT(*) FROM materia WHERE nombre = ?";
            $check_stmt = $BD->prepare($check_query);
            $check_stmt->bind_param("s", $nombre);
            $check_stmt->execute();
            $check_stmt->bind_result($num_rows);
            $check_stmt->fetch();
            $check_stmt->close();
            if ($num_rows == 0) {
                $query = "INSERT INTO materia(nombre,profesor_FK) 
                values(?,?)";
                $stmt = $BD->prepare($query);
                $stmt->bind_param("ss", $nombre, $profesor_FK);
                $stmt->execute();
                header("location:insertMateria.php");
            } else {
                print("DATOS YA EXISTENTES");
            }
        } else {
            print("DATOS VACIOS");
        }
    } catch (Exception $e) {
        echo "<div class='alert alert-warning'>Datos del DNI invalidos</div>";
    }
}
