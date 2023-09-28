<!DOCTYPE html>
<html lang="esp">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>T.S.A</title>
</head>
<body>
    <h3 class="text-center p-3"><a href="../home.php">N.W.A</a></h3>
    <div class="container-fluid row">
        <form method="POST" action="../Alumno/insertAlumnos.php" class="col-4 p-3">
            <h3 class="text-center text-secondary">Registrar Alumno</h3>
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
        <div class="col-8 p-4">
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
                    include("../Conexion/conexion.php"); 
                    require_once("../Alumno/Alumno.php");
                    $BD = Conexion::connect();
                    $query = 'SELECT * FROM alumno'; 
                    $stmt = $BD->prepare($query);
                    $stmt->execute();
                    $alumnos = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
                    foreach ($alumnos as $alumno_data) {
                        $alumno = new Alumno($alumno_data['alumn_DNI'], $alumno_data['nombre'], $alumno_data['apellido'], $alumno_data['fecha_nac']);
                        ?>
                        <tr>
                            <th scope="row"><?php echo $alumno->alumn_DNI; ?></th>
                            <td><?php echo $alumno->nombre; ?></td>
                            <td><?php echo $alumno->apellido; ?></td>
                            <td><?php echo $alumno->fecha_nac; ?></td>
                            <td>
                                <a class="btn btn-small btn-primary" href="edit_alumno.php?alumn_DNI=<?= $alumno->alumn_DNI ?>">Editar</a>
                                <a class="btn btn-small btn-danger" href="#">Eliminar</a> <!-- Añadí un # para el atributo href -->
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
<<<<<<< HEAD
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
=======
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
        include("..\Conexion\conexion.php");
        require_once("../Alumno/Alumno.php");
       try{ $BD = Conexion::connect();
         $query = 'SELECT * FROM alumno';
          $stmt=$BD->prepare($query);
          $stmt->execute();
          $result = $stmt->get_result();
          $stmt->close();
          $alumnos = $result->fetch_all(MYSQLI_ASSOC);
          foreach ($alumnos as $alumno_data){  
            $alumno = new Alumno($alumno_data['alumn_DNI'], $alumno_data['nombre'], $alumno_data['apellido'], $alumno_data['fecha_nac']);
            ?>
            <tr>
              <th scope="row"><?php echo $alumno->alumn_DNI; ?></th>
              <td><?php echo $alumno->nombre; ?></td>
              <td><?php echo $alumno->apellido; ?></td>
              <td><?php echo $alumno->fecha_nac; ?></td>
              <td>
                <a class="btn btn-small btn-primary" href="edit_alumno.php?alumn_DNI=<?= $alumno->alumn_DNI ?>">Editar</a>
                <a class="btn btn-small btn-danger" href="">Eliminar</a>
              </td>
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
>>>>>>> acd67cd29f07901f4fbe2d3932d1a5c125467c40
