<?php
require_once("conexion.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nota = $_POST["nota"];
    $parcial_id = $_POST["id"];
    $alumno_dni = $_POST["DNI"];
    if ($nota && $parcial_id && $alumno_dni  != NULL) {
        $query = "insert into hacen(nota,id,DNI) 
            values(:nota,:id,:DNI)";
        $stmt = $connect->prepare($query);
        $stmt->bindParam("nota:", $nota);
        $stmt->bindParam("id:", $parcial_id);
        $stmt->bindParam("DNI:", $alumno_dni);
        $stmt->execute();
        print($nombre);
    } else {
        print("DATOS VACIOS");
    }
} else {
    print("METODO NO VALIDO");
}
