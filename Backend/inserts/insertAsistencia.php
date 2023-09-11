<?php
require_once("conexion.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fecha = $_POST["fecha"];
    $materia_id = $_POST["id"];
    $alumno_dni = $_POST["DNI"];
    $estado = $_POST["estado"];
    if ($fecha && $parcial_id && $alumno_dni && $estado != NULL) {
        $query = "insert into hacen(fecha,id,DNI,estado) 
            values(:fecha,:id,:DNI,:estado)";
        $stmt = $connect->prepare($query);
        $stmt->bindParam("fecha:", $nota);
        $stmt->bindParam("id:", $materia_id);
        $stmt->bindParam("DNI:", $alumno_dni);
        $stmt->bindParam("estado:", $estado);
        $stmt->execute();
        print($nombre);
    } else {
        print("DATOS VACIOS");
    }
} else {
    print("METODO NO VALIDO");
}
