<?php
require_once("conexion.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $DNI = $_POST["DNI"];
    $telefono = $_POST["telefono"];
    $apellido = $_POST["apellido"];
    $nombre = $_POST["nombre"];
    if ($DNI && $telefono && $apellido && $nombre != NULL) {
        $check_query = "SELECT COUNT(*) FROM profesor WHERE DNI = :DNI";
        $check_stmt = $connect->prepare($check_query);
        $check_stmt->bindParam(":DNI", $DNI);
        $check_stmt->execute();
        $num_rows = $check_stmt->fetchColumn();

        if ($num_rows == 0) {
            $query = "insert into profesor(DNI,telefono,apellido,nombre) 
            values(:DNI,:telefono,:apellido,:nombre)";
            $stmt = $connect->prepare($query);
            $stmt->bindParam(":DNI", $DNI);
            $stmt->bindParam(":telefono", $telefono);
            $stmt->bindParam(":apellido", $apellido);
            $stmt->bindParam(":nombre", $nombre);
            $stmt->execute();
            print($nombre . "agregado correctamente.");
        } else {
            print("DATOS YA EXISTENTES");
        }
    } else {
        print("DATOS VACIOS");
    }
}


//$queryUpd='update jugadoras set nombre=:nombre, apellido=:apellido, club=:club, edad=:edad where id=:id';
