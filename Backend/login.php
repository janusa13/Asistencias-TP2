<?php
require_once("Conexion\conexion.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $prof_DNI = $_POST["prof_DNI"];
    
    if ($prof_DNI != NULL) {
        $query = "SELECT COUNT(*) FROM profesor WHERE prof_DNI = :prof_DNI";
        $stmt = $connect->prepare($query);
        $stmt->bindParam(":prof_DNI", $prof_DNI);
        $stmt->execute();
        $num_rows = $stmt->fetchColumn();
        if ($num_rows > 0) {
            header("Location: home.html");
        } else {
            echo"DNI no registrado";
        }
    }
}
?>
