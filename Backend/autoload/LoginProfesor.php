<?php

session_start();

if (isset($_SESSION['prof_DNI'])) {
    header('Location: /php-home');
}

require_once("../Conexion/conexion.php");

if (!empty($_POST['nombre']) && !empty($_POST['prof_DNI'])) {
    $records = $connect->prepare('SELECT prof_DNI,nombre  FROM profesor WHERE prof_DNI = :prof_DNI');
    $records->bindParam(':prof_DNI', $_POST['prof_DNI']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $message = '';

    if (count($results) > 0 && password_verify($_POST['prof_DNI'], $results['nombre'])) {
        $_SESSION['prod_DNI'] = $results['id'];
        header("Location: /php-home");
    } else {
        $message = 'Perdon,estos datos son incorrectos';
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
        <form method="POST" action="../autoload/LoginProfesor.php" class="col-4 p-3">
            <h3 class="text-center text-secondary">Iniciar Seccion</h3>
            <div class="mb-3">
                <label for="alumn_dni" class="form-label">DNI</label>
                <input type="text" class="form-control" name="prof_DNI" id="prof_dni" aria-describedby="dni_alumno">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre">
                </div>
                <button type="submit" class="btn btn-primary" name="btnRegistrar" value="ok">conectar</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>