<?php
    $diasRestados = isset($_POST["restarDias"]) ? $_POST["restarDias"] : 0;
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

        public function mostrarAlumnos($alumno){?>
            <tr>
                <th class="porcentajeAlumno"  scope="row"><?php echo $alumno->alumn_DNI; ?></th>
                <td><?php echo $alumno->nombre; ?></td>
                <td><?php echo $alumno->apellido; ?></td>
                <td><?php echo $alumno->fecha_nac; ?></td>
                <td><?php echo $alumno->asistencias; ?></td>
                <td ><?php echo $alumno->alumnoPorcentaje($alumno) . "%"; ?></td>
                <td ><?php echo $alumno->condicionAlumno($alumno); ?></td>
                <td>
                    <a class="btn btn-small btn-primary" href="Alumno/Asistencia.php?alumn_DNI=<?= $alumno->alumn_DNI ?>">Asistio</a>
                </td>
            </tr>
        <?php
        }
        
        //Funcion que muestra los alumnos, permite editar y eliminar
        public function mostrarEditarAlumnos($alumno){
            ?><tr>
                    <th scope="row" ><?php echo $alumno->alumn_DNI; ?></th>
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
        public function alumnoPorcentaje($alumno)
        {
            try {
                $BD = Conexion::connect();
                $prof_DNI=123;
                $query = 'SELECT diasClases, porcentajeLibre, porcentajePromocion FROM profesor WHERE prof_DNI = ?';
                $stmt = $BD->prepare($query);
                $stmt->bind_param("i", $prof_DNI);
                $stmt->execute();
                $result = $stmt->get_result();
                $stmt->close();
                $profesor = $result->fetch_all(MYSQLI_ASSOC);
    
                if (!empty($profesor) && isset($profesor[0]['diasClases'])) {
                    
                    $diasClases = $profesor[0]['diasClases'];
                    $porcentaje = $alumno->asistencias * 100;
                    $porcentaje = $porcentaje / $diasClases;
                    $porcentaje = round($porcentaje, 0);
                    
                } else {
                    $diasClases = 0; 
                    $porcentaje = 0; 
                }
            } catch (PDOException $e) {
                $e;
            }
            return $porcentaje;
        }


public function condicionAlumno($alumno) {
    try {
        $BD = Conexion::connect();
        $prof_DNI = 123;
        $query = 'SELECT porcentajeLibre, porcentajePromocion FROM profesor WHERE prof_DNI = ?';
        $stmt = $BD->prepare($query);
        $stmt->bind_param("i", $prof_DNI);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        $profesor = $result->fetch_all(MYSQLI_ASSOC);
        $condicion="Regular";
        if (!empty($profesor) && isset($profesor[0]['porcentajeLibre']) && isset($profesor[0]['porcentajePromocion'])) {
            $porcentaje = $alumno->alumnoPorcentaje($alumno);
            $porcentaje = (float) $porcentaje;
            $porcentajeLibre = (float) $profesor[0]['porcentajeLibre'];
            $porcentajePromocion = (float) $profesor[0]['porcentajePromocion'];
            if ($porcentaje>=$porcentajePromocion) {
                $condicion="Promocion";
            } elseif($porcentaje<$porcentajeLibre) {
                $condicion="Libre";
            }
        }
    } catch (PDOException $e) {
        $e;
    }
    return $condicion;
}
    }
    function TraerDatosAlumnos(){
            try{ $BD = Conexion::connect();
                $query = 'SELECT * FROM alumno';
                $stmt=$BD->prepare($query);
                $stmt->execute();
                $result = $stmt->get_result();
                $stmt->close();
                $alumnos = $result->fetch_all(MYSQLI_ASSOC);
            }catch(PDOException $e){
                die("Error:".$e->getMessage());
            }
        return $alumnos;
    }


?>