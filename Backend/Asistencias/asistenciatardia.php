<?php
include("registrarAsistenciaTardia.php");
$msg_err=asistenciaTardia($msg_err);

?>
<!DOCTYPE html>
<html lang="esp" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Bootstrap/css/bootstrap.min.css" />
    <title>N.W.A</title>
</head>
<body>
   <h3 class=" text-center p-3"><a href="../home.php">N.W.A</a></h3>
    <div class="container-fluid row">
        <form method="POST" action="asistenciatardia.php" class="col-4 p-3 m-auto">
            <h3 class="text-center text-secondary">Asistencia Tardia</h3>
            <?php
                if(!empty($msg_err)){
                    if($msg_err=="Ya existe una asistencia en esa fecha para ese alumno"){
                        echo"<div class='alert alert-warning'>Ya existe una asistencia en esa fecha para ese alumno</div>";
                    }else if($msg_err=="Insertar datos"){
                        echo"<div class='alert alert-warning'>Datos incompletos</div>";
                    }elseif($msg_err=="Error en algo"){
                        echo "<div class='alert alert-warning'>Error en algo</div>";
                    }
                }elseif($msg_err=="asistencia exitosa"){
                    echo"<div class='alert alert-warning'>Asistencia Registrada</div>";
                }
            ?>
            <label for="alumn_DNI" class="form-label">DNI del Alumno</label>
            <input type="text" class="form-control" id="alumn_DNI" name="alumno_FK"onkeydown="validarNumerosTecla(event)">
            <label for="fecha" class="form-label">Fecha de la Asistencia</label>
            <input type="date" class="form-control" id="fecha" name="fecha"/>
            <button type="submit"  class="btn btn-primary">Asistio</button>
        </form>
    </div>
</body>
<script>
    function validarNumerosTecla(event) {
        const tecla = event.key;
        const numerosPermitidos = /^[-0-9]$/;
        if (tecla !== "Backspace" && tecla !== "Delete" && (!numerosPermitidos.test(tecla) || event.key === " ")) {
            event.preventDefault();
        }
    }

</script>
</html>