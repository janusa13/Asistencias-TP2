<?php
require_once("conexion.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $materia_id = $_POST["materia_ID"];
    $nombre = $_POST["nombre"];
    $profesor_FK = $_POST["profesor_FK"];
    if ($materia_id && $nombre && $profesor_FK != NULL) {
        $check_query = "SELECT COUNT(*) FROM materia WHERE materia_id = :materia_id";
        $check_stmt = $connect->prepare($check_query);
        $check_stmt->bindParam(":materia_id", $materia_id);
        $check_stmt->execute();
        $num_rows = $check_stmt->fetchColumn();

        if ($num_rows == 0) {
            $query = "insert into materia(materia_ID,nombre,dias,profesor_FK) 
            values(:materia_ID,:nombre,:dias, :profesor_FK)";
            $stmt = $connect->prepare($query);
            $stmt->bindParam(":materia_ID", $materia_id);
            $stmt->bindParam(":nombre", $nombre);
            $stmt->bindParam(":profesor_FK",$profesor_FK);
            $stmt->execute();
            print($nombre . "agregado correctamente.");
        } else {
            print("DATOS YA EXISTENTES");
        }
    } else {
        print("DATOS VACIOS");
    }
}
