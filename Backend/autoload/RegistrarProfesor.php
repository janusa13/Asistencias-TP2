<?php
require_once("../Conexion/conexion.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $prof_DNI = $_POST["prof_DNI"];
    $telefono = $_POST["telefono"];
    $apellido = $_POST["apellido"];
    $nombre = $_POST["nombre"];
    if ($nombre && $apellido && $telefono && $prof_DNI != NULL) {
        $check_query = "SELECT COUNT(*) FROM profesor WHERE prof_DNI = :prof_DNI ";
        $check_stmt = $connect->prepare($check_query);
        $check_stmt->bindParam(":prof_DNI", $prof_DNI);
        $check_stmt->execute();
        $num_rows = $check_stmt->fetchColumn();

        if ($num_rows == 0) {
            $query = "insert into profesor(prof_DNI,telefono,apellido,nombre) 
            values(:prof_DNI,:telefono,:apellido,:nombre)";
            $stmt = $connect->prepare($query);
            $stmt->bindParam(":prof_DNI", $prof_DNI);
            $stmt->bindParam(":telefono", $telefono);
            $stmt->bindParam(":apellido", $apellido);
            $stmt->bindParam(":nombre", $nombre);
            $stmt->execute();
            print($nombre . "agregado correctamente");
        } else {
            print("DATOS YA EXISTENTES");
        }
    } else {
        print("DATOS VACIOS");
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
    <h3 class=" text-center p-3"> <a href="../home.php">T.S.A</a></h3>
    <div class="container-fluid row">
        <form method="POST" action="../autoload/RegistrarProfesor.php" class="col-4 p-3">
            <h3 class="text-center text-secondary">Registrar Profesor</h3>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>