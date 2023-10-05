<?php
session_start();



if (isset($_SESSION['prof_DNI'])) {
  $records = $conn->prepare('SELECT prof_DNI,nombre  FROM profesor WHERE prof_DNI = :prof_DNI');
  $records->bindParam(':prof_DNI', $_SESSION['prof_DNI']);
  $records->execute();
  $results = $records->fetch(PDO::FETCH_ASSOC);

  $profesor = null;

  if (count($results) > 0) {
    $profesor = $results;
  }
}
?>
<!DOCTYPE html>
<html lang="esp">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
  <title>T.S.A</title>
</head>

<body class="p-2">
  <h3 class=" text-center p-3"><a href="../home.php">N.W.A </a> </h3>
  <a href="Alumno\insertAlumno.PHP" class="btn btn-small btn-primary">Registrar Alumno</a>
  <a href="autoload\RegistrarProfesor.php" class="btn btn-small btn-primary">Registrar Docente</a>
  <a href="autoload/LoginProfesor.php" class="btn btn-small btn-primary">Login Docente</a>
  <div class="container-fluid row ">
    <form method="POST" action="home.php" class="col-4 p-3 ">
      <h3 class="text-center text-secondary">Buscar Alumno</h3>
      <div class="mb-3">
        <label for="nombre_alumno" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="nombre_alumno" name="nombre" />
      </div>
      <div class="mb-3">
        <label for="apellido_alumno" class="form-label">Apellido</label>
        <input type="text" class="form-control" id="apellido_alumno" name="apellido" />
        <div class="mb-3">
          <label for="DNI" class="form-label">DNI</label>
          <input type="text" class="form-control" id="alumn_DNI" name="alumn_DNI" />
          <button type="submit" class="btn btn-primary" name="btnRegistrar" value="ok">
            Buscar
          </button>
        </div>
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
          require_once('Conexion\conexion.php');
          require_once('Alumno/Alumno.php');
          if (isset($_POST["nombre"]) && isset($_POST["apellido"]) && isset($_POST["alumn_DNI"])) {
            $nombre =  '%' . $_POST["nombre"] . '%';
            $apellido = '%' . $_POST["apellido"] . '%';
            $alumn_DNI = $_POST["alumn_DNI"];
            $query = 'SELECT * FROM alumno WHERE (:nombre = "" OR nombre LIKE :nombre) AND (:apellido = "" OR apellido LIKE :apellido) AND (:alumn_DNI = "" OR alumn_DNI=:alumn_DNI)';
            $stmt = $connect->prepare($query);
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':apellido', $apellido);
            $stmt->bindParam(':alumn_DNI', $alumn_DNI);
            $stmt->execute();
            $alumnos = $stmt->fetchAll();
            foreach ($alumnos as $alumno_data) {
              $alumno = new Alumno($alumno_data['alumn_DNI'], $alumno_data['nombre'], $alumno_data['apellido'], $alumno_data['fecha_nac']);
          ?>
              <tr>
                <th scope="row"><?php echo $alumno->alumn_DNI; ?></th>
                <td><?php echo $alumno->nombre; ?></td>
                <td><?php echo $alumno->apellido; ?></td>
                <td><?php echo $alumno->fecha_nac; ?></td>
                <td>
                  <a class="btn btn-small btn-primary" href="">Asistio</a>
                </td>
              </tr>
          <?php }
          }
          ?>
        </tbody>
      </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous" 6></script>
</body>

</html>