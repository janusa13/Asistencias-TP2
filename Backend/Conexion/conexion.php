<?php
class Conexion 
{
    public static function connect()
    {
        $mariaDB = new mysqli('localhost', 'root', '', 'asistencia');

        if ($mariaDB->connect_errno) {
            echo "<p hidden>Fallo la conexión: " . $mariaDB->connect_error . "</p>";
            return null; // retorna null en caso de fallo
        } else {
            echo "<p hidden>Conexión exitosa</p>";
            return $mariaDB; // retorna el objeto de conexión en caso de exito
        }
    }
}

// $BD = Conexion::connect()
// $var (variable que le queres asignar) = mysqli_query ($BD, " aca iria la consulta.");
?>