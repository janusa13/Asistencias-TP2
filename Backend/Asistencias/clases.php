<?php
include("../Profesor/insertProfesor.php");
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <title>Opcion de clases</title>
</head>

<body>
    <a href="../home.php" class=" text-center p-3">N.W.A</h3></a>
    <form method="POST" action="clases.php" class="col-4 p-3 ">
        <h3 class="text-center text-secondary">Opciones de Clases</h3>
        <div class="mb-3">
            <label for="prof_DNI" class="form-label">Insertar DNI profesor</label>
            <input type="text" class="form-control" id="prof_DNI" name="prof_DNI" />
        </div>
        <hr />
        <div class="mb-3">
            <label for="CantidadClases" class="form-label">Insertar cantidad total de clases</label>
            <input type="text" class="form-control" id="cantidadClases" name="diasClases" />
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
        <button type="submit" class="btn btn-primary" name="btnRegistrar" value="ok"> Ingresar Dias</button>
        <hr />
        <div class="mb-3">
    </form>
    <label for="restarDias" class="form-label">Ingresar Feriados/Dias sin clases.</label>
    <input type="text" class="form-control" id="restarDias" name="restarDias" />
    </div>
    <button type="submit" class="btn btn-primary" name="btnRegistrar" value="ok">Restar Dias</button>
    <hr />
    <?php
    updateDiasProfesor();
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>