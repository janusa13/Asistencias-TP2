<?php
require_once("../Conexion/conexion.php");
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $alumn_DNI=$_POST["alumn_DNI"];
    $nombre=$_POST["nombre"];
    $apellido=$_POST["apellido"];
    $fecha_nac=$_POST["fecha_nac"];
    if($alumn_DNI && $nombre && $apellido && $fecha_nac != NULL ){
        $check_query ="SELECT COUNT(*) FROM alumno WHERE alumn_DNI = :alumn_DNI";
        $check_stmt = $connect->prepare($check_query);
        $check_stmt->bindParam(":alumn_DNI", $alumn_DNI);
        $check_stmt->execute();
        $num_rows=$check_stmt->fetchColumn();

    if ($num_rows==0){
        $query="insert into alumno(alumn_DNI,nombre,apellido,fecha_nac) 
            values(:alumn_DNI,:nombre,:apellido,:fecha_nac)";
        $stmt=$connect->prepare($query);
        $stmt->bindParam(":alumn_DNI",$alumn_DNI);
        $stmt->bindParam(":nombre",$nombre);
        $stmt->bindParam(":apellido",$apellido);
        $stmt->bindParam(":fecha_nac",$fecha_nac);
        $stmt->execute();
        print($nombre . "agregado correctamente.");
        
        
    }else{
        print("DATOS YA EXISTENTES");
    }
}else{
    print("DATOS VACIOS");
}
}
?>