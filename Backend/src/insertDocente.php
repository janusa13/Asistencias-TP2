<!DOCTYPE html>
<html lang="esp">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../Bootstrap/css/bootstrap.min.css" />
  <title>T.S.A</title>
</head>

<body>
  <h3 class=" text-center p-3"><a href="../home.php">N.W.A</a></h3>
  <div class="container-fluid row">
    <form method="POST" action="../Profesor/insertProfesor.php" class="col-4 p-3">
      <h3 class="text-center text-secondary">Registrar Docente</h3>
      <div class="mb-3">
        <label for="alumn_dni" class="form-label">DNI</label>
        <input type="text" class="form-control" name="prof_DNI" id="prof_dni" aria-describedby="dni_alumno">
        <div class="mb-3">
          <label for="nombre" class="form-label">Nombre</label>
          <input type="text" class="form-control" id="nombre" name="nombre">
        </div>
        <div class="mb-3">
          <label for="apellido" class="form-label">Apellido</label>
          <input type="text" class="form-control" id="apellido" name="apellido">
        </div>
      </div>
      <div class="mb-3">
        <label for="telefono" class="form-label">Telefono</label>
        <input type="text" class="form-control" id="telefono" name="telefono">
      </div>
      <button type="submit" class="btn btn-primary" name="btnRegistrar" value="ok">Registrar</button>
    </form>
  </div>
  <script src="../Bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>