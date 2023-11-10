<?php
// Verifica si se recibió el parámetro "alumn_DNI" en la URL
if (isset($_GET["alumn_DNI"])) {
    $alumn_DNI = $_GET["alumn_DNI"];
    $msg = insertAsistencias($alumn_DNI);
}
function insertAsistencias($alumn_DNI) {
    include("../Conexion/conexion.php");
    $fecha = date("Y-m-d");
    $msg = "";
    try {
        $BD = Conexion::connect();

        $querySelect = 'SELECT * FROM Asistencia WHERE alumno_FK = ? AND fecha = ?';
        $stmtSelect = $BD->prepare($querySelect);
        $stmtSelect->bind_param("is", $alumn_DNI, $fecha);
        $stmtSelect->execute();
        $result = $stmtSelect->get_result();
        $row = $result->fetch_assoc();

        if (!$row) {
            $queryInsert = 'INSERT INTO Asistencia (alumno_FK, fecha) VALUES (?, ?)';
            $stmtInsert = $BD->prepare($queryInsert);
            $stmtInsert->bind_param("is", $alumn_DNI, $fecha);

            if ($stmtInsert->execute()) {
                $msg = "Asistencia registrada con éxito.";
            } else {
                $msg = "Error al insertar asistencia.";
            }
        } else {
            $msg = "Ya existe una asistencia para este alumno en esta fecha.";
        }
    } catch (mysqli_sql_exception $e) {
        die("Error: " . $e->getMessage());
    }
    header("location:../home.php");
    return $msg;
}

/* AGREGAR PODER INSERTAR UNA ASISTENCIA, FECHA DE ASISTENCIA DE TIPO TIMESTAND para registrar asistencias tardias agregar asistencias taridas como boton al lado de asistencias
*/
