<!DOCTYPE html>
<html lang="esp">
<head>
<meta charset="UTF-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Configuracion</title>
</head>
<body>
    <form method="POST" class="col-4 p-3" action="insertDias.php">
    <div class="mb-3">
    <label for="dias_Totales" class="form-label">Dias totales</label>
    <input type="number" class="form-control" name="dias_Totales" id="dias_Totales" aria-describedby="dias_Totales">
    <div class="mb-3">
    <div>
    <label for="faltas" class="form-label">Faltas</label>
    <input type="faltas" class="faltas" name="faltas" id="faltas" aria-describedby="faltas">
    </div>
    <button type="submit" class="btn btn-primary" value="ok">Buscar</button>
</form>
<?php
    
?>
</body>
</html>