<?php
require_once("../Conexion/conexion.php");
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $prof_DNI=$_POST["prof_DNI"];
    $telefono=$_POST["telefono"];
    $apellido=$_POST["apellido"];
    $nombre=$_POST["nombre"];
    if($nombre && $apellido && $telefono && $prof_DNI != NULL ){
        $check_query="SELECT COUNT(*) FROM profesor WHERE prof_DNI = :prof_DNI ";    
        $check_stmt = $connect->prepare($check_query);
        $check_stmt->bindParam(":prof_DNI", $prof_DNI);
        $check_stmt->execute();
        $num_rows = $check_stmt->fetchColumn();

    if($num_rows==0){
        $query="insert into profesor(prof_DNI,telefono,apellido,nombre) 
            values(:prof_DNI,:telefono,:apellido,:nombre)";
        $stmt = $connect->prepare($query);
        $stmt->bindParam(":prof_DNI", $prof_DNI);
        $stmt->bindParam(":telefono", $telefono);
        $stmt->bindParam(":apellido", $apellido);
        $stmt->bindParam(":nombre", $nombre);
        $stmt->execute();
        print($nombre ."agregado correctamente");
    }else{
        print("DATOS YA EXISTENTES");
    }
}else{
    print("DATOS VACIOS");
}
}
?>