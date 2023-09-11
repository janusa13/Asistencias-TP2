<?php
require_once("conexion.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $parcial_id = $_POST["id"];
    $fecha = $_POST["fecha"];
    if ($parcial_id && $fecha  != NULL) {
        $query = "insert into parciales(id,fecha) 
            values(:id,:fecha)";
        $stmt = $connect->prepare($query);
        $stmt->bindParam("id:", $parcial_id);
        $stmt->bindParam("fecha:", $fecha);
        $stmt->execute();
        print($nombre);
    } else {
        print("DATOS VACIOS");
    }
} else {
    print("METODO NO VALIDO");
}
