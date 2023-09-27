<?php
require_once("../Conexion/conexion.php");
require_once("../Alumno/Alumno.php"); 
if (isset($_POST["nombre"]) && isset($_POST["apellido"])) {
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $query = 'SELECT * FROM alumno WHERE nombre = :nombre AND apellido = :apellido';
    $stmt = $connect->prepare($query);
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':apellido', $apellido);
    $stmt->execute();
    $alumnos = $stmt->fetchAll();
    foreach ($alumnos as $alumno_data) {
        $alumno = new Alumno($alumno_data['alumn_DNI'], $alumno_data['nombre'], $alumno_data['apellido'], $alumno_data['fecha_nac']);
    }
    echo "
        <div class='tablaAlumno'>
        <table border='1'>
            <tr>
                <th>DNI</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Fecha de Nacimiento</th>
                <th>Registrar Asistencia</th>
                <th>Configuracion</th>\
            </tr>
            <tr>
                <td>{$alumno->alumn_DNI}</td>
                <td>{$alumno->nombre}</td>
                <td>{$alumno->apellido}</td>
                <td>{$alumno->fecha_nac}</td>
                <td>
                <button>Asistio</button>
                    <button>No Asistio</button>
                    
                </td>
                <td>
                    <button>Editar</button>
                    <button>Dar de Baja</button>
                </td>
            </tr>
        </table>
        </div>
        ";
} else {
    echo "Nombre y apellido deben estar definidos.";
}
?>








