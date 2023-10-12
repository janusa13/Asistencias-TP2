<?php
    class Alumno{
        public $alumn_DNI;
        public $nombre;
        public $apellido;
        public $fecha_nac;
        public $asistencias;
        public $materia_nombre;

        function __construct($alumn_DNI,$nombre,$apellido,$fecha_nac,$asistencias, $materia_nombre){
            $this->alumn_DNI=$alumn_DNI;
            $this->nombre=$nombre;
            $this->apellido=$apellido;
            $this->fecha_nac=$fecha_nac;
            $this->asistencias=$asistencias;
            $this->materia_nombre=$materia_nombre;
        }
    }
?>