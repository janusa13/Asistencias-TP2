<?php
    include("../Conexion/conexion.php");
    include("Alumno.php");
    $alumno1 = new Alumno(41872676, "facundo", "Janusa", "01/01/1999", 50);
    var_dump($alumno1);
    //$alumno1::agregarNota($alumno1);
    $notapromedio = $alumno1::promedioNotas($alumno1);
    echo $notapromedio;
    $porcentajeAsistencia=$alumno1->alumnoPorcentaje($alumno1);
    echo"   .   ";
    echo $porcentajeAsistencia;
    $condicion=$alumno1->condicionAlumno($alumno1);
    echo $condicion;
    if($condicion=="Promocion"&&$notapromedio>=8){
        echo "PROMOCIONADO NASHE";
    }elseif($condicion=="Libre" or $notapromedio<=5){
        echo "LIBRE ESTAS AL HORNO";
    }elseif($notapromedio>=6 or $notapromedio<=7){
        echo "Regular Tranqui";
    }
?>
