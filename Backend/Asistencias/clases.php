<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
    />
    <title>Opcion de clases</title>
</head>
<body>
    <a href="../home.php" class=" text-center p-3">N.W.A</h3>
    <form method="POST" action="clases.php" class="col-4 p-3 ">
        <h3 class="text-center text-secondary">Opciones de Clases</h3>
        <div class="mb-3">
            <label for="CantidadClases" class="form-label">Insertar cantidad total de clases</label>
            <input
                    type="text"
                    class="form-control"
                    id="cantidadClases"
                    name="Clases"
            />
        </div>
        <button type="submit" class="btn btn-primary" name="btnRegistrar" value="ok"> Ingresar Dias</button>
    <form/>
    <hr/>
        <form method="POST" action="clases.php" class="col-4 p-3 ">
        <div class="mb-3">
            <label for="restarDias" class="form-label">Restar Dias</label>
            <input
                    type="text"
                    class="form-control"
                    id="restarDias"
                    name="restarDias"
            />
        </div>
        <button type="submit" class="btn btn-primary" name="btnRegistrar" value="ok"> Buscar</button>
    <form/>
    <?php
        include("../Conexion/conexion.php");
        if($_SERVER["REQUEST_METHOD"]=="POST"){
            try{
                $BD=Conexion::connect();
                $cantidadClases=$_POST["cantidadClases"];
                if($cantidadClases !=NULL){
                    $query="INSERT INTO Profesor(cantidadClases) VALUES(?)";
                    $stmt=$BD->prepare($query);
                    $stmt->bind_param("i",$cantidadClases);
                    $stmt->execute();
                    header("location:clases.php");
                }else{
                    echo"Datos vacios";
                }
            }catch(Exception $e){echo "Error";}
        }
    ?>

<script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"
></script>
</body>
</html>