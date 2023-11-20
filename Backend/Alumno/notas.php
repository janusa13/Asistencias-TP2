<?php
include("alumno.php");
include( "../Conexion/conexion.php");
$msg="";
if($_SERVER["REQUEST_METHOD"]=="POST"){
    try{
        $BD = Conexion::connect();
        $alumno_FK=$_POST["alumno_FK"];
        $nota1=$_POST["nota1"];
        $nota2=$_POST["nota2"];
        if($alumno_FK != NULL && $nota1 !=NULL && $nota2 != NULL){
            $query="INSERT INTO notas (alumno_FK, nota1, nota2) VALUES (?,?,?)";
            $stmt=$BD->prepare($query);
            $stmt->bind_param("iii", $alumno_FK, $nota1, $nota2);
            $stmt->execute();
        }else{
            $msg="Campos Vacios";
        }
    }catch(Exception $e){
        echo $e;
    }
}

?>

<!DOCTYPE html>
<html lang="esp" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="../Bootstrap/css/bootstrap.min.css" />
    <title>NWA</title>
</head>
<body class="p-2">
     <a class="titulo" href="../home.php">
            <h3 class=" text-center p-3">N.W.A</h3>
        </a>
    <div class="container-fluid row">
    <form method="POST" action="notas.php" class="col-4 p-3 shadow p-3 mb-5">
        <label for="alumno_FK" class="form-label">DNI del Alumno</label>
        <input type="text" name="alumno_FK" class="form-control" id="alumno_FK">
        <label for="nota1" class="form-label">Nota 1</label>
        <input type="text" name="nota1" class="form-control" id="nota1">
        <label for="nota2" name="nota2" class="form-label" id="nota2">Nota 2</label>
        <input type="text" name="nota2" id="nota2" class="form-control">
        <button type="submit" class="btn btn-primary">Agregar Notas</button>
    </form>
    </div>

<script src="../Bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>