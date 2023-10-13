<?php
include("../Conexion/conexion.php");
$msg_err = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $BD = Conexion::connect();
        $nombre = $_POST["nombre"];
        $profesor_FK = $_POST["profesor_FK"];
        if ($nombre && $profesor_FK != NULL) {
            $check_query = "SELECT COUNT(*) FROM materia WHERE nombre = ?";
            $check_stmt = $BD->prepare($check_query);
            $check_stmt->bind_param("s", $nombre);
            $check_stmt->execute();
            $check_stmt->bind_result($num_rows);
            $check_stmt->fetch();
            $check_stmt->close();
            if ($num_rows == 0) {
                $query = "INSERT INTO materia(nombre,profesor_FK) 
                values(?,?)";
                $stmt = $BD->prepare($query);
                $stmt->bind_param("ss", $nombre, $profesor_FK);
                $stmt->execute();
                header("location:insertMateria.php");
            } else {
                print("DATOS YA EXISTENTES");
            }
        } else {
            print("DATOS VACIOS");
        }
    } catch (Exception $e) {
        echo "<div class='alert alert-warning'>Datos del DNI invalidos</div>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <title>Ingresar Materia</title>
</head>

<body>
    <a href="../home.php" class=" text-center p-3">N.W.A</a>
    <form method="POST" action="insertMateria.php" class="col-4 p-3">
        <h3 class="text-center text-secondary">Ingresar Materias</h3>
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre de la Materia</label>
            <input type="text" class="form-control" id="nombre" name="nombre" />
            <label for="profesor_FK" class="form-label">Insertar DNI del Docente</label>
            <input type="text" class="form-control" id="profesor_FK" name="profesor_FK" />
        </div>
        <button type="submit" class="btn btn-primary" name="btnRegistrar" value="ok">Registrar Materia</button>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>