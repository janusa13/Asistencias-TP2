<?php
require_once("../Conexion/conexion.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){
   $nombre=$_POST["nombre"]; 
   $apellido=$_POST["apellido"];
if (isset($nombre) && isset($apellido)) {
    $query = 'SELECT * FROM alumno WHERE nombre = :nombre AND apellido = :apellido';
    $stmt = $connect->prepare($query);
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':apellido', $apellido);
    $stmt->execute();
    $alumnos = $stmt->fetchAll();
    var_dump($alumnos);
} else {
    echo "Nombre y apellido deben estar definidos.";
}

}
?>