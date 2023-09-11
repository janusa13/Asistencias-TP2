<?php
require_once("conexion.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $materia_id = $_POST["materia_ID"];
    $nombre = $_POST["nombre"];
    $dias = $_POST["dias"];
    if ($nombre && $materia_id && $dias != NULL) {
        $query = "insert into materia(id,nombre,dias, profesor_FK); 
            values(:id,:nombre,:dias)";
        $stmt = $connect->prepare($query);
        $stmt->bindParam("id:", $materia_id);
        $stmt->bindParam("nombre:", $nombre);
        $stmt->bindParam("dias:", $dias);
        $stmt->execute();
        print($nombre);
    } else {
        print("DATOS VACIOS");
    }
} else {
    print("METODO NO VALIDO");
}
