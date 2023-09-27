<?php
require_once("../Conexion/conexion.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fecha = $_POST["fecha"];
    $materia_id = $_POST["id"];
    $alumno_dni = $_POST["DNI"];
    $estado = $_POST["estado"];
    if ($fecha && $materia_id && $alumno_dni && $estado != NULL) {
        $check_query = "SELECT COUNT(*) FROM alumno WHERE alumno_dni = :alumno_dni";
        $check_stmt = $connect->prepare($check_query);
        $check_stmt->bindParam(":alumno_dni", $alumno_dni);
        $check_stmt->execute();
        $num_rows = $check_stmt->fetchColumn();

        if ($num_rows == 0) {
            $query = "insert into asistencia(fecha,id,DNI,estado) 
            values(:fecha,:id,:DNI,:estado)";
            $stmt = $connect->prepare($query);
            $stmt->bindParam(":fecha", $fecha);
            $stmt->bindParam(":id", $materia_id);
            $stmt->bindParam(":dni", $alumno_dni);
            $stmt->bindParam(":estado", $estado);
            $stmt->execute();
            print($nombre . "agregado correctamente.");
        } else {
            print("DATOS YA EXISTENTES");
        }
    } else {
        print("DATOS VACIOS");
    }
}
