<?php
include("../Conexion/conexion.php");
function ingresarProfesor(){
$msg_err="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $BD = Conexion::connect();
        $prof_DNI = $_POST["prof_DNI"];
        $telefono = $_POST["telefono"];
        $apellido = $_POST["apellido"];
        $nombre = $_POST["nombre"];
        if ($prof_DNI && $telefono && $apellido && $nombre != NULL) {
            $check_query = "SELECT COUNT(*) FROM profesor WHERE prof_DNI = ?";
            $check_stmt = $BD->prepare($check_query);
            $check_stmt->bind_param("s", $prof_DNI);
            $check_stmt->execute();
            $check_stmt->bind_result($num_rows);
            $check_stmt->fetch();
            $check_stmt->close();
            if ($num_rows == 0) {
                $query = "INSERT INTO profesor(prof_DNI, telefono, apellido, nombre) 
                VALUES (?, ?, ?, ?)";
                $stmt = $BD->prepare($query);
                $stmt->bind_param("ssss", $prof_DNI, $telefono, $apellido, $nombre); 
                $stmt->execute();
                header("location:insertProfesor.php");
            } else {
                echo"Datos ya existentes";
            }
        } else {
            echo"Campos vacios";
        }
    } catch (Exception $e) {
        echo $e;
    }
}
}
 function updateDiasProfesor(){
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $BD = Conexion::connect();
        $prof_DNI = $_POST["prof_DNI"];
        $cantidadClases = $_POST["diasClases"];
        $porcentajeLibre = $_POST["porcentajeLibre"];
        $porcentajePromocion = $_POST["porcentajePromocion"];
        if ($cantidadClases && $prof_DNI != NULL) {
            $query = "UPDATE profesor SET diasClases = ?, porcentajeLibre = ?, porcentajePromocion = ? WHERE prof_DNI = ?";
            $stmt = $BD->prepare($query);
            $stmt->bind_param("iiii", $cantidadClases, $porcentajeLibre, $porcentajePromocion, $prof_DNI);
            $stmt->execute();
            header("location: clases.php");
        } else {
            echo "Datos vacíos";
        }
    }
}
?>