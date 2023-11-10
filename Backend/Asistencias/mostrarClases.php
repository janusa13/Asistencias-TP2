<?php
    function mostrarClases(){
        try{
            $BD = Conexion::connect();
            $prof_DNI=123;
            $query="SELECT diasClases,porcentajeLibre,porcentajePromocion FROM profesor WHERE prof_DNI=?";
            $stmt=$BD->prepare($query);
            $stmt->bind_param("i",$prof_DNI);
            $stmt->execute();
            $result=$stmt->get_result();
            $stmt->close();
            $resultado=$result->fetch_all(MYSQLI_ASSOC);


        }catch(PDOException $e){
            echo $e;
        }
        return $resultado;
    }
