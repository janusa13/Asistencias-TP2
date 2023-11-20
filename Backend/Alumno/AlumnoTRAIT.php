<?php 
    trait notas {
        static public function agregarNota($alumno) {
            $alumno_DNI = $alumno->alumn_DNI;
            $nota1 = 6;
            $nota2 = 7;
            
            if ($alumno_DNI !== NULL && $nota1 !== NULL && $nota2 !== NULL) {
                try {
                    $BD = Conexion::connect();
                    $query = "INSERT INTO notas(alumno_FK, nota1, nota2) VALUES (?,?,?)";
                    $stmt = $BD->prepare($query);
                    $stmt->bind_param("iii", $alumno_DNI, $nota1, $nota2);
                    $stmt->execute();
                } catch (Exception $e) {
                    echo $e;
                }
            }
        }
    static public function promedioNotas($alumno) {
        $alumno_DNI = $alumno->alumn_DNI;
        $nota1 = 0;
        $nota2 = 0;
        $promedioNotas = 0;
        if ($alumno_DNI !== NULL) {
            try {
                $BD = Conexion::connect();
                $query = "SELECT nota1, nota2 FROM notas WHERE alumno_FK=?";
                $stmt = $BD->prepare($query);
                $stmt->bind_param("i", $alumno_DNI);
                $stmt->execute();
                $stmt->bind_result($nota1, $nota2);
                if ($stmt->fetch()) {
                    $promedioNotas = $nota1 + $nota2;
                    $promedioNotas=$promedioNotas/2;
                } else {
                  
                }
            } catch (Exception $e) {
                echo $e;
            }
        }
        return $promedioNotas;
    }
    }
?>
