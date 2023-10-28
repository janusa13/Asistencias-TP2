<?php
require_once("Alumno/Alumno.php");
require_once("Alumno/buscarAlumno.php");
include("Conexion/conexion.php");
include("Alumno/Asistencia.php");
?>
<!DOCTYPE html>
<html lang="esp">

<head>
<<<<<<< HEAD
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="Bootstrap/css/bootstrap.min.css" />
  <title>T.S.A</title>
</head>

<body class="p-2">
  <a href="home.php">
    <h3 class=" text-center p-3">N.W.A</h3>
  </a>
  <a href="Alumno\insertAlumno.PHP" class="btn btn-small btn-primary">Opciones de Alumnos</a>
  <a href="src\insertDocente.PHP" class="btn btn-small btn-primary">Registrar Docente</a>
  <a href="Asistencias\clases.PHP" class="btn btn-small btn-primary">Opciones de clases</a>
  <div class="container-fluid row">
    <form method="POST" action="home.php" class="col-4 p-3">
      <h3 class="text-center text-secondary">Buscar Alumno</h3>
      <div class="mb-3">
        <label for="nombre_alumno" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="nombre_alumno" name="nombre" />
      </div>
      <div class="mb-3">
        <label for="apellido_alumno" class="form-label">Apellido</label>
        <input type="text" class="form-control" id="apellido_alumno" name="apellido" />
      </div>
      <div class="mb-3">
        <label for="DNI" class="form-label">DNI</label>
        <input type="text" class="form-control" id="alumn_DNI" name="alumn_DNI" />
        <button type="submit" class="btn btn-primary" name="btnRegistrar" value="ok">
          Buscar
        </button>
      </div>
    </form>
    <div class="col-8 p-4">
      <table class="table-responsive ">
        <thead>
          <tr>
            <th scope="col">DNI</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellido</th>
            <th scope="col">Fecha de Nacimiento</th>
            <th scope="col">Asistencias</th>
            <th scope="col">Porcentaje</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          <?php
          $alumnos = buscarAlumno();
          foreach ($alumnos as $alumno_data) {
            $alumno = new Alumno($alumno_data['alumn_DNI'], $alumno_data['nombre'], $alumno_data['apellido'], $alumno_data['fecha_nac'], $alumno_data['asistencias']);
            $alumno->mostrarAlumnos($alumno);
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
  <script src="Bootstrap/js/bootstrap.bundle.min.js"></script>
=======
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="Bootstrap/css/bootstrap.min.css" />
    <title>T.S.A</title>
</head>

<body class="p-2">
    <a href="home.php">
        <h3 class=" text-center p-3">N.W.A</h3>
    </a>
    <a href="Alumno\insertAlumno.PHP" class="btn btn-small btn-primary">Opciones de Alumnos</a>
    <a href="Asistencias\clases.PHP" class="btn btn-small btn-primary">Parametros</a>
    <div class="container-fluid row">
        <form method="POST" action="home.php" class="col-4 p-3">
            <h3 class="text-center text-secondary">Buscar Alumno</h3>
            <div class="mb-3">
                <label for="nombre_alumno" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre_alumno" name="nombre" />
            </div>
            <div class="mb-3">
                <label for="apellido_alumno" class="form-label">Apellido</label>
                <input type="text" class="form-control" id="apellido_alumno" name="apellido" />
            </div>
            <div class="mb-3">
                <label for="DNI" class="form-label">DNI</label>
                <input type="text" class="form-control" id="alumn_DNI" name="alumn_DNI" />
                <button type="submit" class="btn btn-primary" name="btnRegistrar" value="ok">
                    Buscar
                </button>
            </div>
        </form>
        <div class="col-8 p-4">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">DNI</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">Fecha de Nacimiento</th>
                        <th scope="col">Asistencias</th>
                        <th scope="col">Porcentaje</th>
                        <th scope="col">Condicion</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $alumnos = buscarAlumno();
                    foreach ($alumnos as $alumno_data) {
                        $alumno = new Alumno($alumno_data['alumn_DNI'], $alumno_data['nombre'], $alumno_data['apellido'], $alumno_data['fecha_nac'], $alumno_data['asistencias']);
                        $alumno->mostrarAlumnos($alumno);
                        
                        
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="Bootstrap/js/bootstrap.bundle.min.js"></script>

>>>>>>> 0378d5d58660e5f5128670c2eacb002d74331ae4
</body>

</html>