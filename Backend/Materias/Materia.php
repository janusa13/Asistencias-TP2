<?php
    class Materia{
        public $materia_ID;
        public $nombre;
        public $profesor_FK;
        public $cantidadClases;

        function __construct($materia_ID, $nombre, $profesor_FK, $cantidadClases){
            $this->materia_ID=$materia_ID;
            $this->nombre=$nombre;
            $this->profesor_FK=$profesor_FK;
            $this->cantidadClases=$cantidadClases;
        }
    }

?>