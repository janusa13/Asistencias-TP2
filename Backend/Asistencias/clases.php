<?php
include("../Profesor/insertProfesor.php");
<<<<<<< HEAD
=======
include("../Profesor/restarDias.php");
include("mostrarClases.php");
>>>>>>> 0378d5d58660e5f5128670c2eacb002d74331ae4
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Bootstrap/css/bootstrap.min.css" />
<<<<<<< HEAD
    <title>Opcion de clases</title>
=======
    <title>Parametros</title>
>>>>>>> 0378d5d58660e5f5128670c2eacb002d74331ae4
</head>

<body>
    <a href="../home.php" class=" text-center p-3">N.W.A</h3></a>
    <form method="POST" action="clases.php" class="col-4 p-3 ">
        <h3 class="text-center text-secondary">Opciones de Parametros</h3>
        <hr />
        <div class="mb-3">
            <label for="prof_DNI" class="form-label">Insertar DNI profesor</label>
            <input type="text" class="form-control" id="prof_DNI" name="prof_DNI" />
        </div>
        <hr />
        <div class="mb-3">
            <label for="CantidadClases" class="form-label">Insertar cantidad total de clases</label>
<<<<<<< HEAD
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
=======
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
        <br>
        <button type="submit" class="btn btn-primary" name="btnRegistrar" value="ok">Restar Dias</button>
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
>>>>>>> 0378d5d58660e5f5128670c2eacb002d74331ae4
    <?php
    updateDiasProfesor();
    ?>

    <script src="../Bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>