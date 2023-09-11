<?php
require_once("conexion.php");
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $alumno_dni=$_POST["DNI"];
    $nombre=$_POST["nombre"];
    $apellido=$_POST["apellido"];
    $fechaNacimiento=$_POST["fecha_Nacimiento"];
    if($alumno_dni && $nombre && $apellido && $fechaNacimiento != NULL ){
        $query="insert into alumnos(alumno_dni,nombre,apellido,fechaNacimiento) 
            values(:alumno_dni,:nombre,:apellido,:fechaNacimiento)";
        $stmt=$connect->prepare($query);
        $stmt->bindParam(":alumno_dni",$alumno_dni);
        $stmt->bindParam(":nombre",$nombre);
        $stmt->bindParam(":apellido",$apellido);
        $stmt->bindParam(":fechaNacimiento",$fechaNacimiento);
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