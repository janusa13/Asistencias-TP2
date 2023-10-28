<?php
            function buscarAlumno(){

                try {
                    $BD = Conexion::connect();
                    $nombre = '';
                    $apellido = '';
                    $alumn_DNI = '';
                    if (isset($_POST["nombre"])) {
                        $nombre = $_POST["nombre"];
                    }
                    if (isset($_POST["apellido"])) {
                        $apellido = $_POST["apellido"];
                    }
                    if (isset($_POST["alumn_DNI"])) {
                        $alumn_DNI = $_POST["alumn_DNI"];
                    }
                    $query = 'SELECT alumn_DNI, nombre, apellido, asistencias, DATE_FORMAT(fecha_nac, "%d-%m-%Y") AS fecha_nac FROM alumno WHERE 1';
                    $conditions = array();
                    if (!empty($nombre)) {
                        $conditions[] = "nombre LIKE '%" . $nombre . "%'";
                    }
                    if (!empty($apellido)) {
                        $conditions[] = "apellido LIKE '%" . $apellido . "%'";
                    }
                    if (!empty($alumn_DNI)) {
                        $conditions[] = "alumn_DNI = '" . $alumn_DNI . "'";
                    }
                    if (!empty($conditions)) {
                        $query .= " AND " . implode(" AND ", $conditions);
                    }
                    $stmt = $BD->prepare($query);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $alumnos = $result->fetch_all(MYSQLI_ASSOC);
                }catch (PDOException $e) {
                    die("Error: " . $e->getMessage());
                }
                return $alumnos;
            }
?>