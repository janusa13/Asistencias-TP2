<?php
require_once("conexion.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $trabajos_id = $_POST["id"];
    $fecha_entrega = $_POST["entrega"];
    $fecha_inicio = $_POST["inicio"];
    if ($fecha_entrega && $fecha_inicio && $trabajos_id != NULL) {
        $check_query = "SELECT COUNT(*) FROM alumno WHERE trabajos_id = :trabajos_id";
        $check_stmt = $connect->prepare($check_query);
        $check_stmt->bindParam(":trabajos_id", $trabajos_id);
        $check_stmt->execute();
        $num_rows = $check_stmt->fetchColumn();

        if ($num_rows == 0) {
            $query = "insert into realizan(id,entrega,inicio) 
            values(:id,:entrega,:inicio)";
            $stmt = $connect->prepare($query);
            $stmt->bindParam(":id", $trabajos_id);
            $stmt->bindParam(":entrega", $fecha_entrega);
            $stmt->bindParam(":inicio", $fecha_inicio);
            $stmt->execute();
            print($nombre . "agregado correctamente.");
        } else {
            print("DATOS YA EXISTENTES");
        }
    } else {
        print("DATOS VACIOS");
    }
}
