<?php
include("../Profesor/insertProfesor.php");
include("../Profesor/restarDias.php");
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Bootstrap/css/bootstrap.min.css" />
    <title>Parametros</title>
</head>

<body>
    <a href="../home.php" class=" text-center p-3">N.W.A</h3></a>
    <form method="POST" action="clases.php" class="col-4 p-3 ">
        <h3 class="text-center text-secondary">Opciones de Parametros</h3>
        <hr />
        <div class="mb-3">
            <label for="CantidadClases" class="form-label">Insertar cantidad total de clases</label>
            <input type="text" class="form-control" id="cantidadClases" name="diasClases"  placeholder="Insertar cantidad total de clases"/>
        </div>
        <hr />
        <div class="mb-3">
            <label for="libreDias" class="form-label">Ingresar porcentaje de libre.</label>
            <input type="text" class="form-control" id="libreDias" name="porcentajeLibre" />
        </div>
        <hr />
        <div class="mb-3">
            <label for="promocionDias" class="form-label">Ingresar porcentaje de promocion.</label>
            <input type="text" class="form-control" id="promocionDias" name="porcentajePromocion" />
        </div>
        <button type="submit" class="btn btn-primary" name="btnRegistrar" value="ok" > Ingresar Parametros</button>
        <hr />
        <div class="mb-3">
    </form>
    <form method="POST" action="clases.php">
        <label for="restarDias" class="form-label">Ingresar Feriados/Dias sin clases.</label>
        <input type="text" class="form-control" id="restarDias" name="restarDias" />
        </div>
        <button type="submit" class="btn btn-primary" name="btnRegistrar" value="ok">Restar Dias</button>
    </form>
    <hr />
    <?php
    updateDiasProfesor();
    //restarDatos();
    ?>

    <script src="../Bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>