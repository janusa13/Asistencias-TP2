<?php
require_once("../Alumno/Alumno.php");
include("../Conexion/conexion.php");
$msg_err = insertarAlumno();
?>
<!DOCTYPE html>
<html lang="esp">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="Bootstrap/css/bootstrap.min.css" />
  <title>T.S.A</title>
</head>

<body>
  <h3 class=" text-center p-3"><a href="../home.php">N.W.A</a></h3>
  <div class="container-fluid row">
    <form method="POST" action="insertAlumno.php" class="col-4 p-3">
      <h3 class="text-center text-secondary">Registrar Alumno</h3>
      <?php
      if (!empty($msg_err)) {
        if ($msg_err == "Datos ya existentes") {
          echo "<div class='alert alert-warning'>Datos ya existentes</div>";
        } else if ($msg_err == "Campos vacios") {
          echo "<div class='alert alert-warning'>Campos vacios</div>";
        } elseif ($msg_err == "Datos del DNI no validos") {
          echo "<div class='alert alert-warning'>Datos del DNI no validos</div>";
        }
      }
      ?>
      <div class="mb-3">
        <label for="alumn_dni" class="form-label">DNI</label>
        <input type="text" class="form-control" name="alumn_DNI" id="alumn_dni" aria-describedby="dni_alumno">
        <div class="mb-3">
          <label for="nombre_alumno" class="form-label">Nombre</label>
          <input type="text" class="form-control" id="nombre_alumno" name="nombre">
        </div>
        <div class="mb-3">
          <label for="apellido_alumno" class="form-label">Apellido</label>
          <input type="text" class="form-control" id="apellido_alumno" name="apellido">
        </div>
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
          <?php
          $alumnos = TraerDatosAlumnos();
          foreach ($alumnos as $alumno_data) {
            $alumno = new Alumno($alumno_data['alumn_DNI'], $alumno_data['nombre'], $alumno_data['apellido'], $alumno_data['fecha_nac'], $alumno_data['asistencias']);
            $alumno->mostrarEditarAlumnos($alumno);
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
  <script src="Bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>