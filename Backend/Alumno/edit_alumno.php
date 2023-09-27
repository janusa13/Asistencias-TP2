<?php
require_once("../Conexion/conexion.php");
require_once("../Alumno/Alumno.php");
$alumn_DNI=$_GET["alumn_DNI"];
 $query = "SELECT * FROM alumno WHERE alumn_DNI=:alumn_DNI";
    $stmt = $connect->prepare($query);
    $stmt->bindParam(':alumn_DNI', $alumn_DNI);
    $stmt->execute();
    $alumnos = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="esp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <h3 class=" text-center p-3">T.S.A</h3>
    <form method="POST" class="col-4 p-3 m-auto">
  <h3 class="text-center text-secondary">Editar Alumno</h3>
  <input type="hidden" name="viejo_DNI" value="<?php echo $_GET['alumn_DNI'];?>"/>
  <?php
    include "modificarAlumno.php";
    foreach($alumnos as $alumno_data){
    $alumno = new Alumno($alumno_data['alumn_DNI'], $alumno_data['nombre'], $alumno_data['apellido'], $alumno_data['fecha_nac']);
    ?>
    <div class="mb-3">
    <label for="alumn_dni" class="form-label">DNI</label>
    <input type="text" class="form-control" name="alumn_DNI" id="alumn_dni" aria-describedby="dni_alumno" value="<?php echo $alumno->alumn_DNI;?>">
  <div class="mb-3">
    <label for="nombre_alumno" class="form-label">Nombre</label>
    <input type="text" class="form-control" id="nombre_alumno" name="nombre" value="<?php echo $alumno->nombre;?>" >
  </div>
    <div class="mb-3">
    <label for="apellido_alumno" class="form-label">Apellido</label>
    <input type="text" class="form-control" id="apellido_alumno" name="apellido" value="<?php echo $alumno->apellido;?>">
  </div>
    </div>
    <div class="mb-3">
    <label for="fecha_alumn" class="form-label">Fecha de nacimiento</label>
    <input type="date" class="form-control" id="fecha_nac" name="fecha_nac" value="<?php echo $alumno->fecha_nac;?>">
  </div>
  <button type="submit" class="btn btn-primary" name="btnRegistrar" value="ok">Editar Alumno</button>
   <?php }
  ?>

</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>