<?php
function restarDatos(){
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        try {
            $BD = Conexion::connect();
            if (isset($_POST["restarDias"]) && isset($_POST["prof_DNI"])) {
                $restarDias = $_POST["restarDias"];
                $prof_DNI = $_POST["prof_DNI"];
                
                $query = "UPDATE profesor SET diasClases = diasClases - ? WHERE prof_DNI = ?";
                $stmt = $BD->prepare($query);
                $stmt->bind_param("ii", $restarDias, $prof_DNI);
                $stmt->execute();
                $stmt->close();
                echo "LISTORTI";
            } else {
                echo "Datos faltantes";
            }
        } catch (PDOException $e) {
            die("ERROR: " . $e->getMessage());
        }
    }
}
?>