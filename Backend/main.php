<?php
require_once('conexion.php');


$query='select * from profesores';
$stmt=$connect -> prepare($query);
$stmt->execute();
$usuarios=$stmt->fetchAll();

phpinfo();




/*  un sistemas para tomar asistencias .
    obligatorio: PHP: POO(herencia, encapsulamiento, traits, estaticos)
                HTML: bootstrap, 
                MYSQL: persista, que quede grabado en una base de datos. 

    requisitos funcionales: cargar asistencias,
    poder hacer un ABM (ALTA BAJA Y MODIFICACION) de alumnos que tenga una interfaz grafica (mas linda que la de ANSES).
    ingresar la cantidad de clases y que diga si esta en condiciones de aprobar o no 80% 70% para regularizar.
    IMPORTANTE: validaciones, que se fije si ya existe una persona que se da de alta por ejemplo
    
        tener una pantalla, donde haga un input de un nombre y le de asistencia de forma sencilla.
            hacer consulta si llega tarde X dias. 
            datos para el AMB: nombre, apellido, DNI, fecha_nacimiento 
            ((materias por las dudas))

    (esto lo agrego yo:)        
    Tener pantallas para:
        Agregar alumnos.
        tomar asistencia diarias
        buscar alumno por nombre y apellido.
        mostrar informacion del alumnos (trabajos entregados, parciales, porcentaje de faltas)
        agregar un calendario de clases tenidas y  clases que no se tuvieron y el motivo del porque (falta del profesor o feriado, etc)

*/


?>