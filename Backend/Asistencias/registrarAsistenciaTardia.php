<?php
include("../Conexion/conexion.php");

$msg_err="";
    function asistenciaTardia($msg_err){
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            try {
                $BD = Conexion::connect();
                $alumno_FK = $_POST["alumno_FK"];
                $fecha = $_POST["fecha"];
                if ($alumno_FK && $fecha != NULL) {
                    $check_query = "SELECT COUNT(*) FROM asistencia WHERE  alumno_FK=? and fecha=?";
                    $check_stmt = $BD->prepare($check_query);
                    $check_stmt->bind_param("is", $alumno_FK, $fecha);
                    $check_stmt->execute();
                    $check_stmt->bind_result($num_rows);
                    $check_stmt->fetch();
                    $check_stmt->close();
                if ($num_rows == 0) {
                    $query = "INSERT INTO asistencia(alumno_FK, fecha) VALUES(?,?)";
                    $stmt = $BD->prepare($query);
                    $stmt->bind_param("ss", $alumno_FK, $fecha);
                    $stmt->execute();
                        header("location:asistenciatardia.php");
                    exit();
                } else {
                    $msg_err = "Ya existe una asistencia en esa fecha para ese alumno";
                }
            } else {
                $msg_err = "Insertar datos";
            }
        } catch (Exception $e) {
            $msg_err = "Error: " . $e->getMessage();
            echo $msg_err;
        }
        }
        
        return $msg_err;
    }

?>