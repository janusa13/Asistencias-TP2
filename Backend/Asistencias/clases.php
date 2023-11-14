<?php
include("../Profesor/insertProfesor.php");
include("mostrarClases.php");

function restarDatos($restarDias){
    try {
        $BD = Conexion::connect();
        $prof_DNI = 123; 
        $query = "UPDATE profesor SET diasClases = diasClases - ? WHERE prof_DNI = ?";
        $stmt = $BD->prepare($query);
        $stmt->bind_param("ii", $restarDias, $prof_DNI);
        $stmt->execute();
        $stmt->close();

        echo "Días actualizados correctamente.";
    } catch (PDOException $e) {
        die("ERROR: " . $e->getMessage());
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['btnRestarDias'])) {
    $restarDias = $_POST['restarDias']; 
    restarDatos($restarDias);
}
?>
<script>
    function validarNumerosTecla(event) {
        const tecla = event.key;
        const numerosPermitidos = /^[-0-9]$/;
        if (tecla !== "Backspace" && tecla !== "Delete" && (!numerosPermitidos.test(tecla) || event.key === " ")) {
            event.preventDefault();
        }
}
</script>
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
            <input type="text" class="form-control" id="cantidadClases" name="diasClases"  placeholder="Insertar cantidad total de clases" onkeydown="validarNumerosTecla(event)"/>
        </div>
        <hr />
        <div class="mb-3">
            <label for="libreDias" class="form-label">Ingresar porcentaje de libre.</label>
            <input type="text" class="form-control" id="libreDias" name="porcentajeLibre" onkeydown="validarNumerosTecla(event)" />
        </div>
        <hr />
        <div class="mb-3">
            <label for="promocionDias" class="form-label">Ingresar porcentaje de promocion.</label>
            <input type="text" class="form-control" id="promocionDias" name="porcentajePromocion" onkeydown="validarNumerosTecla(event)" />
        </div>
        <button type="submit" class="btn btn-primary" name="btnRegistrar" value="ok" > Ingresar Parametros</button>
        <hr />
        <div class="mb-3">
    </form>
    <form method="POST" action="clases.php">
        <label for="restarDias" class="form-label">Ingresar Feriados/Dias sin clases.</label>
        <input type="text" class="form-control" id="restarDias" name="restarDias" onkeydown="validarNumerosTecla(event)" />
        <br>
        <button type="submit" class="btn btn-primary" name="btnRestarDias" value="ok" >Restar Dias</button>
    </form>
    </div>
    <div class="col-8 p-4">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Dias de Clases</th>
                        <th scope="col">Porcentaje de Libre</th>
                        <th scope="col">Porcentaje de Promocion</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $resultados = mostrarClases();
                    foreach ($resultados as $datos) {
                        ?>
                        <tr>
                <th   scope="row"><?php echo $datos["diasClases"]; ?></th>
                <td><?php echo $datos["porcentajeLibre"]; ?></td>
                <td><?php echo $datos["porcentajePromocion"]; ?></td>
            </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['btnRegistrar'])) {
        updateDiasProfesor();
    }
    ?>

    <script src="../Bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>