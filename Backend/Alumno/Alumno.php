<?php

    $msg_err="";

    //Funcion que permite agregar alumnos
    function insertarAlumno(){   
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            try {
                $BD = Conexion::connect();
                $alumn_DNI = $_POST["alumn_DNI"];
                $nombre = $_POST["nombre"];
                $apellido = $_POST["apellido"];
                $fecha_nac = $_POST["fecha_nac"];
                if ($alumn_DNI && $nombre && $apellido && $fecha_nac != NULL) {
                    $check_query = "SELECT COUNT(*) FROM alumno WHERE alumn_DNI = ?";
                    $check_stmt = $BD->prepare($check_query);
                    $check_stmt->bind_param("s", $alumn_DNI);
                    $check_stmt->execute();
                    $check_stmt->bind_result($num_rows);
                    $check_stmt->fetch();
                    $check_stmt->close();
                    if ($num_rows == 0) {
                        $query = "INSERT INTO alumno(alumn_DNI, nombre, apellido, fecha_nac) 
                        VALUES (?, ?, ?, ?)";
                        $stmt = $BD->prepare($query);
                        $stmt->bind_param("ssss", $alumn_DNI, $nombre, $apellido, $fecha_nac); 
                        $stmt->execute();
                        header("location:insertAlumno.php");
                    } else {
                        $msg_err="Datos ya existentes";
                    }
                } else {
                    $msg_err="Campos vacios";
                }
            } catch (Exception $e) {
                $msg_err="Datos del DNI no validos";
            }
        return $msg_err;
    }

    }
    class Alumno{
        public $alumn_DNI;
        public $nombre;
        public $apellido;
        public $fecha_nac;
        public $asistencias;

        function __construct($alumn_DNI,$nombre,$apellido,$fecha_nac,$asistencias){
            $this->alumn_DNI=$alumn_DNI;
            $this->nombre=$nombre;
            $this->apellido=$apellido;
            $this->fecha_nac=$fecha_nac;
            $this->asistencias=$asistencias;
        }

        //Funcion que muestra las propiedades de alumno en una tabla
        public function mostrarAlumnos($alumno){?>
            <tr>
                <th scope="row"><?php echo $alumno->alumn_DNI; ?></th>
                <td><?php echo $alumno->nombre; ?></td>
                <td><?php echo $alumno->apellido; ?></td>
                <td><?php echo $alumno->fecha_nac; ?></td>
                <td><?php echo $alumno->asistencias; ?></td>
                <td>
                    <a class="btn btn-small btn-primary" href="Alumno/Asistencia.php?alumn_DNI=<?= $alumno->alumn_DNI ?>">Asistio</a>
                </td>
            </tr>
        <?php
        }

        //Funcion que muestra los alumnos, permite editar y eliminar
        public function mostrarEditarAlumnos($alumno){
            ?><tr>
                    <th scope="row"><?php echo $alumno->alumn_DNI; ?></th>
                        <td><?php echo $alumno->nombre; ?></td>
                        <td><?php echo $alumno->apellido; ?></td>
                    <td><?php echo $alumno->fecha_nac; ?></td>
                    <td>
                        <a class="btn btn-small btn-primary" href="edit_alumno.php?alumn_DNI=<?= $alumno->alumn_DNI ?>">Editar</a>
                        <a class="btn btn-small btn-danger" onclick="confirmarEliminacion(<?= $alumno->alumn_DNI ?>)">Eliminar</a>
                    </td>
                    <script>
                        function confirmarEliminacion(alumn_DNI) {
                            if (confirm("¿Seguro que deseas eliminar este alumno?")) {
                                window.location.href = "deleteAlumno.php?alumn_DNI=" + alumn_DNI;
                            }
                        }
                    </script>
                </tr> 
            <?php
        }
    }
?>