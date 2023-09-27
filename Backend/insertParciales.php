<?php
require_once("../Conexion/conexion.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $parcial_id = $_POST["id"];
    $fecha = $_POST["fecha"];
    if ($fecha &&  $alumn_dni != NULL) {
        $check_query = "SELECT COUNT(*) FROM alumno WHERE parcial_id = :parcial_id";
        $check_stmt = $connect->prepare($check_query);
        $check_stmt->bindParam(":parcial_id", $parcial_id);
        $check_stmt->execute();
        $num_rows = $check_stmt->fetchColumn();

        if ($num_rows == 0) {
            $query = "insert into parcial(id,fecha) 
            values(:id,:fecha)";
            $stmt = $connect->prepare($query);
            $stmt->bindParam(":id", $parcial_id);
            $stmt->bindParam(":fecha", $fecha);

            $stmt->execute();
            print($nombre . "agregado correctamente.");
        } else {
            print("DATOS YA EXISTENTES");
        }
    } else {
        print("DATOS VACIOS");
    }
}
