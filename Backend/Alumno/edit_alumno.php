<?php
include("../Conexion/conexion.php");
require_once("../Alumno/Alumno.php");

if (isset($_POST["btnRegistrar"])) {
    $viejo_DNI = $_POST["viejo_DNI"];
    $alumn_DNI = $_POST["alumn_DNI"];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $fecha_nac = $_POST["fecha_nac"];

    try {
        $BD = Conexion::connect();

        // Primero, actualiza los registros en la tabla "Asistencia" que hacen referencia al DNI antiguo.
        $update_asistencia_query = "UPDATE Asistencia SET alumno_FK = ? WHERE alumno_FK = ?";
        $update_asistencia_stmt = $BD->prepare($update_asistencia_query);
        $update_asistencia_stmt->bind_param("ii", $alumn_DNI, $viejo_DNI);
        $update_asistencia_stmt->execute();
        $update_asistencia_stmt->close();

        // Luego, actualiza el DNI del alumno en la tabla "Alumno".
        $update_alumno_query = "UPDATE Alumno SET alumn_DNI = ?, nombre = ?, apellido = ?, fecha_nac = ? WHERE alumn_DNI = ?";
        $update_alumno_stmt = $BD->prepare($update_alumno_query);
        $update_alumno_stmt->bind_param("isssi", $alumn_DNI, $nombre, $apellido, $fecha_nac, $viejo_DNI);
        $update_alumno_stmt->execute();
        $update_alumno_stmt->close();

        header("location: insertAlumno.php");
    } catch (mysqli_sql_exception $e) {
        echo "Error al actualizar los datos: " . $e->getMessage();
    }
}

$alumn_DNI = $_GET["alumn_DNI"];
try {
    $BD = Conexion::connect();
    $query = 'SELECT alumn_DNI, nombre, apellido, asistencias, DATE_FORMAT(fecha_nac, "%Y-%m-%d") AS fecha_nac FROM alumno WHERE alumn_DNI = ?';
    $stmt = $BD->prepare($query);
    $stmt->bind_param('i', $alumn_DNI);
    $stmt->execute();
    $result = $stmt->get_result();
    $alumnos = $result->fetch_all(MYSQLI_ASSOC);
} catch (mysqli_sql_exception $e) {
    die("Error: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="esp">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Editar Alumno</title>
  <link rel="stylesheet" href="../Bootstrap/css/bootstrap.min.css" />
</head>

<body>
  <h3 class=" text-center p-3"><a href="insertAlumno.php">N.W.A</a></h3>
  <form method="POST" class="col-4 p-3 m-auto">
    <h3 class="text-center text-secondary">Editar Alumno</h3>
    <?php
    foreach ($alumnos as $alumno_data) {
      $alumno = new Alumno($alumno_data['alumn_DNI'], $alumno_data['nombre'], $alumno_data['apellido'], $alumno_data['fecha_nac'], $alumno_data['asistencias']);
    ?>
      <input type="hidden" name="viejo_DNI" value="<?php echo $alumno->alumn_DNI; ?>" />
      <div class="mb-3">
        <label for="alumn_dni" class="form-label">DNI</label>
        <input type="text" class="form-control" name="alumn_DNI" id="alumn_dni" aria-describedby="dni_alumno" value="<?php echo $alumno->alumn_DNI; ?>" onkeydown="validarNumerosTecla(event)">
      </div>
      <div class="mb-3">
        <label for="nombre_alumno" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="nombre_alumno" name="nombre" value="<?php echo $alumno->nombre; ?>"onkeydown="validarTecla(event)">
      </div>
      <div class="mb-3">
        <label for="apellido_alumno" class="form-label">Apellido</label>
        <input type="text" class="form-control" id="apellido_alumno" name="apellido" value="<?php echo $alumno->apellido; ?>"onkeydown="validarTecla(event)">
      </div>
      <div class="mb-3">
        <label for="fecha_alumn" class="form-label">Fecha de nacimiento</label>
        <input type="date" class="form-control" id="fecha_nac" name="fecha_nac" value="<?php echo $alumno->fecha_nac; ?>">
      </div>
      <button type="submit" class="btn btn-primary" name="btnRegistrar" value="ok">Editar Alumno</button>
    <?php } ?>
  </form>
  <script src="../Bootstrap/js/bootstrap.min.js"></script>
   <script>
  function validarTecla(event) {
    const tecla = event.key;
    const caracteresPermitidos = /^[A-ZÁÉÍÓÚÜÑa-záéíóúüñ ]$/;
    if (tecla !== "Backspace" && tecla !== "Delete" && !caracteresPermitidos.test(tecla)) {
      event.preventDefault();
    }
  }

    function validarNumerosTecla(event) {
      const tecla = event.key;
      const numerosPermitidos = /^[-0-9]$/;
      if (tecla !== "Backspace" && tecla !== "Delete" && (!numerosPermitidos.test(tecla) || event.key === " ")) {
        event.preventDefault();
      }
    }
  </script>
</body>
</html>
