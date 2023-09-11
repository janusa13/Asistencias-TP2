<?php
require_once("conexion.php");
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $prof_DNI=$_POST["DNI"];
    $telefono=$_POST["telefono"];
    $apellido=$_POST["apellido"];
    $nombre=$_POST["nombre"];
    if($nombre && $apellido && $telefono && $prof_DNI != NULL ){
        $query="insert into profesor(prof_DNI,telefono,apellido,nombre) 
            values(:prof_DNI,:telefono,:apellido,:nombre)";
        $stmt=$connect->prepare($query);
        $stmt->bindParam(":prof_DNI",$prof_DNI);
        $stmt->bindParam(":telefono",$telefono);
        $stmt->bindParam(":apellido",$apellido);
        $stmt->bindParam(":nombre",$nombre);
        $stmt->execute();
        print($nombre);
        
        
    }else{
        print("DATOS VACIOS");
    }
}else{
    print("METODO NO VALIDO");
}

//$queryUpd='update jugadoras set nombre=:nombre, apellido=:apellido, club=:club, edad=:edad where id=:id';
?>