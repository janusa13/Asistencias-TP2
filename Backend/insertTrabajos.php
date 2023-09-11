<?php
require_once("conexion.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $trabajos_id = $_POST["id"];
    $fecha_entrega = $_POST["entrega"];
    $fecha_inicio = $_POST["inicio"];
    if ($trabajos_id && $fecha_entrega && $fecha_inicio  != NULL) {
        $query = "insert into trabajos(id,entrega,inicio) 
            values(:id,:entrega,:inicio)";
        $stmt = $connect->prepare($query);
        $stmt->bindParam("id:", $trabajos_id);
        $stmt->bindParam("entrega:", $fecha_entrega);
        $stmt->bindParam("inicio:", $fecha_inicio);
        $stmt->execute();
        print($nombre);
    } else {
        print("DATOS VACIOS");
    }
} else {
    print("METODO NO VALIDO");
}
