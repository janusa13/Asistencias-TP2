<?php
require_once("../Conexion/conexion.php");
require_once("../Alumno/Alumno.php");

$msg_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $alumn_DNI = $_POST["alumn_DNI"];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $fecha_nac = $_POST["fecha_nac"];

    if (isValidData($alumn_DNI, $nombre, $apellido, $fecha_nac)) {
        try {
            $BD = Conexion::connect();
            
            if (!isExistingAlumn($BD, $alumn_DNI)) {
                addAlumn($BD, $alumn_DNI, $nombre, $apellido, $fecha_nac);
                header("location:insertAlumno.php");
            } else {
                $msg_err = "Datos ya existentes";
            }
        } catch (Exception $e) {
            $msg_err = "Error: " . $e->getMessage();
        }
    } else {
        $msg_err = "Campos vacios";
    }
}

function isValidData($alumn_DNI, $nombre, $apellido, $fecha_nac) {
    return $alumn_DNI && $nombre && $apellido && $fecha_nac;
}

function isExistingAlumn($BD, $alumn_DNI) {
    $check_query = "SELECT COUNT(*) FROM alumno WHERE alumn_DNI = ?";
    $check_stmt = $BD->prepare($check_query);
    $check_stmt->bind_param("s", $alumn_DNI);
    $check_stmt->execute();
    $check_stmt->bind_result($num_rows);
    $check_stmt->fetch();
    $check_stmt->close();
    return $num_rows > 0;
}

function addAlumn($BD, $alumn_DNI, $nombre, $apellido, $fecha_nac) {
    $query = "INSERT INTO alumno(alumn_DNI, nombre, apellido, fecha_nac) VALUES (?, ?, ?, ?)";
    $stmt = $BD->prepare($query);
    $stmt->bind_param("ssss", $alumn_DNI, $nombre, $apellido, $fecha_nac);
    $stmt->execute();
}

$alumnos = fetchAllAlumnos();

function fetchAllAlumnos() {
    $BD = Conexion::connect();
    $query = 'SELECT * FROM alumno';
    $stmt = $BD->prepare($query);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    return $result->fetch_all(MYSQLI_ASSOC);
}
function generateErrorMessage($msg) {
  if (!$msg) {
      return "";
  }
  return "<div class='alert alert-warning'>{$msg}</div>";
}
?>
<!DOCTYPE html>
<html lang="esp">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>T.S.A</title>
</head>
<body>
<h3 class=" text-center p-3"><a href="../home.php">N.W.A</a></h3>
<div class="container-fluid row">
    <form method="POST" action="insertAlumno.php" class="col-4 p-3">
        <h3 class="text-center text-secondary">Registrar Alumno</h3>
        <?php echo generateErrorMessage($msg_err); ?>
        <div class="mb-3">
            <label for="alumn_dni" class="form-label">DNI</label>
            <input type="text" class="form-control" name="alumn_DNI" id="alumn_dni" aria-describedby="dni_alumno">
        </div>
        <div class="mb-3">
            <label for="nombre_alumno" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre_alumno" name="nombre">
        </div>
        <div class="mb-3">
            <label for="apellido_alumno" class="form-label">Apellido</label>
            <input type="text" class="form-control" id="apellido_alumno" name="apellido">
        </div>
        <div class="mb-3">
            <label for="fecha_alumn" class="form-label">Fecha de nacimiento</label>
            <input type="date" class="form-control" id="fecha_nac" name="fecha_nac">
        </div>
        <button type="submit" class="btn btn-primary" name="btnRegistrar" value="ok">Registrar</button>
    </form>
    <div class="col -8 p-4">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">DNI</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Fecha de Nacimiento</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($alumnos as $alumno_data):
                $alumno = new Alumno($alumno_data['alumn_DNI'], $alumno_data['nombre'], $alumno_data['apellido'], $alumno_data['fecha_nac'], $alumno_data['asistencias']); ?>
                <tr>
                    <th scope="row"><?php echo $alumno->alumn_DNI; ?></th>
                    <td><?php echo $alumno->nombre; ?></td>
                    <td><?php echo $alumno->apellido; ?></td>
                    <td><?php echo $alumno->fecha_nac; ?></td>
                    <td>
                        <a class="btn btn-small btn-primary" href="edit_alumno.php?alumn_DNI=<?= $alumno->alumn_DNI ?>">Editar</a>
                        <a class="btn btn-small btn-danger" href="deleteAlumno.php?alumn_DNI=<?= $alumno->alumn_DNI ?>"
                           onclick="confirmarEliminacion(<?= $alumno->alumn_DNI ?>)">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script>
    function confirmarEliminacion(alumn_DNI) {
        if (confirm("¿Seguro que deseas eliminar este alumno?")) {
            window.location.href = "deleteAlumno.php?alumn_DNI=" + alumn_DNI;
        }
    }
</script>
</body>
</html>