<?php
require_once("conexion.php");
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $alumn_dni=$_POST["alumn_dni"];
    $nombre=$_POST["nombre"];
    $apellido=$_POST["apellido"];
    $fecha_nac=$_POST["fecha_nac"];
    if($alumn_dni && $nombre && $apellido && $fecha_nac != NULL ){
        $query="insert into alumno(alumn_dni,nombre,apellido,fecha_nac) 
            values(:alumn_dni,:nombre,:apellido,:fecha_nac)";
        $stmt=$connect->prepare($query);
        $stmt->bindParam(":alumn_dni",$alumn_dni);
        $stmt->bindParam(":nombre",$nombre);
        $stmt->bindParam(":apellido",$apellido);
        $stmt->bindParam(":fecha_nac",$fecha_nac);
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