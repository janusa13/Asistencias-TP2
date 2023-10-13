<?php
include("../Conexion/conexion.php");
$msg_err = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $BD = Conexion::connect();
        $nota = $_POST["nota"];
        $parcial_id = $_POST["id"];
        $alumno_dni = $_POST["DNI"];
        if ($nota && $parcial_id && $alumn_dni != NULL) {
            $check_query = "SELECT COUNT(*) FROM hacen_Parciales WHERE alumno_dni = ?";
            $check_stmt = $BD->prepare($check_query);
            $check_stmt->bind_param("s", $alumn_DNI);
            $check_stmt->execute();
            $check_stmt->bind_result($num_rows);
            $check_stmt->fetch();
            $check_stmt->close();
            if ($num_rows == 0) {
                $query = "INSERT INTO realizan(nota,id,DNI) 
                VALUES(?,?,?)";
                $stmt = $BD->prepare($query);
                $stmt->bind_param("sss", $nota, $parcial_id, $alumn_dni);
                $stmt->execute();
                header("location:insertHacenParciales.php");
            } else {
                $msg_err = "DATOS YA EXISTENTES";
            }
        } else {
            $msg_err = "DATOS VACIOS";
        }
    } catch (Exception $e) {
        $msg_err = "Datos no validos";
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
        <form method="POST" action="insertHacenParciales.php" class="col-4 p-3">
            <h3 class="text-center text-secondary">Nota del Alumno</h3>
            <?php
            if ($msg_err == "Datos ya existentes") {
                echo "<div class='alert alert-warning'>Datos ya existentes</div>";
            } else if ($msg_err == "Datos vacios") {
                echo "<div class='alert alert-warning'>Datos vacios</div>";
            } elseif ($msg_err == "Datos  no validos") {
                echo "<div class='alert alert-warning'>Datos  no validos</div>";
            }

            ?>
            <div class="mb-3">
                <label for="alumn_dni" class="form-label">DNI Alumno</label>
                <input type="text" class="form-control" name="alumn_dni" id="alumn_dni" aria-describedby="dni_alumno">
                <div class="mb-3">
                    <label for="parcial_id" class="form-label">Id del Parcial</label>
                    <input type="text" class="form-control" id="parcial_id" name="parcial_id">
                </div>
                <div class="mb-3">
                    <label for="nota" class="form-label">Nota</label>
                    <input type="text" class="form-control" id="nota" name="nota">
                </div>

                <button type="submit" class="btn btn-primary" name="btnRegistrar" value="ok">Registrar</button>
        </form>