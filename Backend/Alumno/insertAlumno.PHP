<?php
include("../Conexion/conexion.php");
$msg_err="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $BD = Conexion::connect();
        $alumn_DNI = $_POST["alumn_DNI"];
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $fecha_nac = $_POST["fecha_nac"];
        if ($alumn_DNI && $nombre && $apellido && $fecha_nac != NULL) {
            $check_query = "SELECT COUNT(*) FROM alumno WHERE alumn_DNI = ?";
            $check_stmt = $BD->prepare($check_query);
            $check_stmt->bind_param("s", $alumn_DNI);
            $check_stmt->execute();
            $check_stmt->bind_result($num_rows);
            $check_stmt->fetch();
            $check_stmt->close();
            if ($num_rows == 0) {
                $query = "INSERT INTO alumno(alumn_DNI, nombre, apellido, fecha_nac) 
                VALUES (?, ?, ?, ?)";
                $stmt = $BD->prepare($query);
                $stmt->bind_param("ssss", $alumn_DNI, $nombre, $apellido, $fecha_nac); 
                $stmt->execute();
                header("location:insertAlumno.php");
            } else {
                $msg_err="Datos ya existentes";
            }
        } else {
            $msg_err="Campos vacios";
        }
    } catch (Exception $e) {
        $msg_err="Datos del DNI no validos";
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
<form method="POST" action="insertAlumno.php" class="col-4 p-3">
  <h3 class="text-center text-secondary">Registrar Alumno</h3>
  <?php
if($msg_err=="Datos ya existentes"){
  echo "<div class='alert alert-warning'>Datos ya existentes</div>";
}else if($msg_err=="Campos vacios"){
  echo "<div class='alert alert-warning'>Campos vacios</div>";
}elseif ($msg_err=="Datos del DNI no validos") {
  echo "<div class='alert alert-warning'>Datos del DNI no validos</div>";
}

  ?>
  <div class="mb-3">
    <label for="alumn_dni" class="form-label">DNI</label>
    <input type="text" class="form-control" name="alumn_DNI" id="alumn_dni" aria-describedby="dni_alumno">
  <div class="mb-3">
    <label for="nombre_alumno" class="form-label">Nombre</label>
    <input type="text" class="form-control" id="nombre_alumno" name="nombre" >
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
        require_once("../Alumno/Alumno.php");
      try{ $BD = Conexion::connect();
         $query = 'SELECT * FROM alumno';
          $stmt=$BD->prepare($query);
          $stmt->execute();
          $result = $stmt->get_result();
          $stmt->close();
          $alumnos = $result->fetch_all(MYSQLI_ASSOC);
          foreach ($alumnos as $alumno_data){
            $alumno = new Alumno($alumno_data['alumn_DNI'], $alumno_data['nombre'], $alumno_data['apellido'], $alumno_data['fecha_nac'], $alumno_data['asistencias']);
            ?>
            <tr>
              <th scope="row"><?php echo $alumno->alumn_DNI; ?></th>
              <td><?php echo $alumno->nombre; ?></td>
              <td><?php echo $alumno->apellido; ?></td>
              <td><?php echo $alumno->fecha_nac; ?></td>
              <td>
                <a class="btn btn-small btn-primary" href="edit_alumno.php?alumn_DNI=<?= $alumno->alumn_DNI ?>">Editar</a>
                <a class="btn btn-small btn-danger" onclick="confirmarEliminacion(<?= $alumno->alumn_DNI ?>)">Eliminar</a>
              </td>
              <script>
                function confirmarEliminacion(alumn_DNI) {
                  if (confirm("¿Seguro que deseas eliminar este alumno?")) {
                    window.location.href = "deleteAlumno.php?alumn_DNI=" + alumn_DNI;
                  }
                }
              </script>
            </tr> 
          <?php }
          $BD=null;
      }catch (PDOException $e){
        die("Error: ".$e->getMessage());
      }
          ?>
      </tbody>
    </table>
  </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>