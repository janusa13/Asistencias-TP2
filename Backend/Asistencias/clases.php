<?php
include("../Profesor/insertProfesor.php");
include("../Profesor/restarDias.php");
include("mostrarClases.php");
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Bootstrap/css/bootstrap.min.css" />
    <title>Parametros</title>
    <script src="../index.js" defer></script>
</head>

<body>
    <symbol id="circle-half" viewBox="0 0 16 16">
        <path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z" />
    </symbol>
    <symbol id="moon-stars-fill" viewBox="0 0 16 16">
        <path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z" />
        <path d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z" />
    </symbol>
    <symbol id="sun-fill" viewBox="0 0 16 16">
        <path d="M8 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z" />
    </symbol>
    <nav class="navbar navbar-expand-lg bg-primary py-3" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand pb-2" href="#">N.W.A</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../home.php">Home</a>
                    </li>
                </ul>

                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item dropdown w-25" data-bs-theme="light">
                        <button class="btn btn-link nav-link py-1 px-0 px-lg-2 dropdown-toggle d-flex align-items-center" id="bd-theme" type="button" aria-expanded="false" data-bs-toggle="dropdown" data-bs-display="static">
                            <svg class="bi my-1 theme-icon-active" width="16" height="16" fill="currentColor">
                                <use href="#circle-half"></use>
                            </svg>
                            <span class="d-lg-none ms-2">Toggle theme</span>
                        </button>

                        <ul class="dropdown-menu dropdown-menu-end px-1" aria-labelledby="bd-theme">
                            <li>
                                <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="light">
                                    <svg class="bi me-2 opacity-50 theme-icon" width="16" height="16" fill="currentColor">
                                        <use href="#sun-fill"></use>
                                    </svg>
                                    Light
                                </button>
                            </li>
                            <li>
                                <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark">
                                    <svg class="bi me-2 opacity-50 theme-icon" width="16" height="16" fill="currentColor">
                                        <use href="#moon-stars-fill"></use>
                                    </svg>
                                    Dark
                                </button>
                            </li>
                            <li>
                                <button type="button" class="dropdown-item d-flex align-items-center active" data-bs-theme-value="auto">
                                    <svg class="bi me-2 opacity-50 theme-icon" width="16" height="16" fill="currentColor">
                                        <use href="#circle-half"></use>
                                    </svg>
                                    Auto
                                </button>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <form method="POST" action="clases.php" class="col-4 p-3 ">
        <h3 class="text-center text-secondary">Opciones de Parametros</h3>
        <hr />
        <div class="mb-3">
            <label for="prof_DNI" class="form-label">Insertar DNI profesor</label>
            <input type="text" class="form-control" id="prof_DNI" name="prof_DNI" />
        </div>
        <hr />
        <div class="mb-3">
            <label for="CantidadClases" class="form-label">Insertar cantidad total de clases</label>
            <input type="text" class="form-control" id="cantidadClases" name="diasClases" placeholder="Insertar cantidad total de clases" />
        </div>
        <hr />
        <div class="mb-3">
            <label for="libreDias" class="form-label">Ingresar porcentaje de libre.</label>
            <input type="text" class="form-control" id="libreDias" name="porcentajeLibre" />
        </div>
        <hr />
        <div class="mb-3">
            <label for="promocionDias" class="form-label">Ingresar porcentaje de promocion.</label>
            <input type="text" class="form-control" id="promocionDias" name="porcentajePromocion" />
        </div>
        <button type="submit" class="btn btn-outline-primary" name="btnRegistrar" value="ok"> Ingresar Parametros</button>
        <hr />
        <div class="mb-3">
    </form>
    <form method="POST" action="clases.php">
        <label for="restarDias" class="form-label">Ingresar Feriados/Dias sin clases.</label>
        <input type="text" class="form-control" id="restarDias" name="restarDias" />
        <br>
        <button type="submit" class="btn btn-primary" name="btnRegistrar" value="ok">Restar Dias</button>
    </form>
    </div>
    <div class="col-8 p-4">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Dias de Clases</th>
                    <th scope="col">Porcentaje de Libre</th>
                    <th scope="col">Porcentaje de Promocion</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $resultados = mostrarClases();
                foreach ($resultados as $datos) {
                ?>
                    <tr>
                        <th scope="row"><?php echo $datos["diasClases"]; ?></th>
                        <td><?php echo $datos["porcentajeLibre"]; ?></td>
                        <td><?php echo $datos["porcentajePromocion"]; ?></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    <?php
    updateDiasProfesor();
    ?>

    <script src="../Bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>