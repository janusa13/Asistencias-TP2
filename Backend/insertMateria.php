<?php
require_once("conexion.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $materia_id = $_POST["id"];
    $nombre = $_POST["nombre"];
    $dias = $_POST["dias"];
    if ($materia_id && $nombre && $dias != NULL) {
        $check_query = "SELECT COUNT(*) FROM materia WHERE materia_id = :materia_id";
        $check_stmt = $connect->prepare($check_query);
        $check_stmt->bindParam(":materia_id", $materia_id);
        $check_stmt->execute();
        $num_rows = $check_stmt->fetchColumn();

        if ($num_rows == 0) {
            $query = "insert into materia(id,nombre,dias) 
            values(:id,:nombre,:dias)";
            $stmt = $connect->prepare($query);
            $stmt->bindParam(":id", $materia_id);
            $stmt->bindParam(":nombre", $nombre);
            $stmt->bindParam(":dias", $dias);
            $stmt->execute();
            print($nombre . "agregado correctamente.");
        } else {
            print("DATOS YA EXISTENTES");
        }
    } else {
        print("DATOS VACIOS");
    }
}
