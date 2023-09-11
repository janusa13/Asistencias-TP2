<?php
require_once("conexion.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nota = $_POST["nota"];
    $parcial_id = $_POST["id"];
    $alumno_dni = $_POST["DNI"];
    if ($nota && $parcial_id && $alumn_dni != NULL) {
        $check_query = "SELECT COUNT(*) FROM alumno WHERE alumno_dni = :alumno_dni";
        $check_stmt = $connect->prepare($check_query);
        $check_stmt->bindParam(":alumno_dni", $alumno_dni);
        $check_stmt->execute();
        $num_rows = $check_stmt->fetchColumn();

        if ($num_rows == 0) {
            $query = "insert into realizan(nota,id,DNI) 
            values(:nota,:nombre,:DNI,)";
            $stmt = $connect->prepare($query);
            $stmt->bindParam(":nota", $nota);
            $stmt->bindParam(":id", $parcial_id);
            $stmt->bindParam(":dni", $alumno_dni);
            $stmt->execute();
            print($nombre . "agregado correctamente.");
        } else {
            print("DATOS YA EXISTENTES");
        }
    } else {
        print("DATOS VACIOS");
    }
}
