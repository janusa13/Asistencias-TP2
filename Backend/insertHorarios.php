<?php
require_once("conexion.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dias = $_POST["dias"];
    $hora_entrada = $_POST["entrada"];
    $hora_salida = $_POST["salida"];
    if ($dias && $hora_entrada && $hora_salida != NULL) {
        $query = "insert into horarios(dias,entrada,salida) 
            values(:dias,:entrada,:salida)";
        $stmt = $connect->prepare($query);
        $stmt->bindParam("dias:", $dias);
        $stmt->bindParam("entrada:", $hora_entrada);
        $stmt->bindParam("salida:", $hora_salida);
        $stmt->execute();
        print($nombre);
    } else {
        print("DATOS VACIOS");
    }
} else {
    print("METODO NO VALIDO");
}
