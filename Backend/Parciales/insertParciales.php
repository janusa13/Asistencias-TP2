<?php
include("../Conexion/conexion.php");
$msg_err = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $BD = Conexion::connect();
        $parcial_id = $_POST["id"];
        $nombre = $_POST["nombre"];
        $fecha = $_POST["fecha"];
        $materia_fk = $_POST["materia"];
        if ($fecha &&  $parcial_id && $nombre  && $materia_fk != NULL) {
            $check_query = "SELECT COUNT(*) FROM Parciales WHERE parcial_id = ?";
            $check_stmt = $BD->prepare($check_query);
            $check_stmt->bind_param("s", $parcial_id);
            $check_stmt->execute();
            $check_stmt->bind_result($num_rows);
            $check_stmt->fetch();
            $check_stmt->close();
            if ($num_rows == 0) {
                $query = "INSERT INTO parcial(id,nombre,fecha,materia) 
                VALUES (?,?)";
                $stmt = $BD->prepare($query);
                $stmt->bind_param("ssss", $parcial_id, $nombre, $fecha, $materia_fk);
                $stmt->execute();
                header("location:insertParciales.php");
                $msg_err = "Agregado correctamente.";
            } else {
                $msg_err = "DATOS YA EXISTENTES";
            }
        } else {
            $msg_err = "DATOS VACIOS";
        }
    } catch (Exception $e) {
        $msg_err = "Error al agregar parcial";
    }
}
?>
<!DOCTYPE html>
<html lang="esp">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>T.S.A</title>
</head>

<body>
    <h3 class=" text-center p-3"><a href="../home.php">N.W.A</a></h3>
    <div class="container-fluid row">
        <form method="POST" action="insertParciales.php" class="col-4 p-3">
            <h3 class="text-center text-secondary">Registrar Parcial</h3>
            <?php
            if ($msg_err == "Datos ya existentes") {
                echo "<div class='alert alert-warning'>Datos ya existentes</div>";
            } else if ($msg_err == "Campos vacios") {
                echo "<div class='alert alert-warning'>Campos vacios</div>";
            } elseif ($msg_err == "Parcial ya existente") {
                echo "<div class='alert alert-warning'> Parcial ya existente</div>";
            }

            ?>
            <div class="mb-3">
                <label for="parcial_id" class="form-label">id Parcial</label>
                <input type="text" class="form-control" name="id" id="id" value="">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre del Parcial</label>
                    <input type="text" class="form-control" id="nombre" name="nombre">
                </div>
                <div class="mb-3">
                    <label for="materia_fk" class="form-label">Nombre de la Materia</label>
                    <input type="text" class="form-control" name="materia" id="materia_fk" name="materia_fk">
                </div>
            </div>
            <div class="mb-3">
                <label for="fecha" class="form-label">Fecha del Parcial</label>
                <input type="date" class="form-control" id="fecha" name="fecha">
            </div>
            <button type="submit" class="btn btn-primary" name="btnRegistrar" value="ok">Registrar</button>
        </form>