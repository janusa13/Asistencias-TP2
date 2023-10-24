<?php
require_once("../Conexion/conexion.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dias = $_POST["dias"];
    $hora_entrada = $_POST["entrada"];
    $hora_salida = $_POST["salida"];
    $materia_id = $_POST["id"];
    if ($nota && $trabajo_id && $materia_id != NULL) {
        $check_query = "SELECT COUNT(*) FROM alumno WHERE materia_id = :materia_id";
        $check_stmt = $connect->prepare($check_query);
        $check_stmt->bindParam(":materia_id", $materia_id);
        $check_stmt->execute();
        $num_rows = $check_stmt->fetchColumn();

        if ($num_rows == 0) {
            $query = "insert into horarios(dias,entrada,salida,id) 
            values(:dias,:entrada,:salida,:id)";
            $stmt = $connect->prepare($query);
            $stmt->bindParam(":dias", $dias);
            $stmt->bindParam(":entrada", $hora_entrada);
            $stmt->bindParam(":salida", $hora_salida);
            $stmt->bindParam(":id", $materia_id);
            $stmt->execute();
            print($nombre . "agregado correctamente.");
        } else {
            print("DATOS YA EXISTENTES");
        }
    } else {
        print("DATOS VACIOS");
    }
}