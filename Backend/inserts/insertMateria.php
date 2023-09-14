<?php
require_once("conexion.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $profesor_FK = $_POST["profesor_FK"];
    if ( $nombre && $profesor_FK != NULL) {
        $check_query = "SELECT COUNT(*) FROM materia WHERE nombre = :nombre";
        $check_stmt = $connect->prepare($check_query);
        $check_stmt->bindParam(":nombre", $nombre);
        $check_stmt->execute();
        $num_rows = $check_stmt->fetchColumn();

        if ($num_rows == 0) {
            $query = "insert into materia(nombre,profesor_FK) 
            values(:nombre, :profesor_FK)";
            $stmt = $connect->prepare($query);
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
