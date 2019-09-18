<?php

    namespace POO;

    class Carrera{
        private $codigoCarrera;
        private $nombreCarrera;
        private $cantidadClases;
        private $clases;
        private $jefe;
        private $coordinador;

        public function __construct(
            $codigoCarrera,
            $nombreCarrera,
            $cantidadClases,
            $clases,
            $jefe,
            $coordinador
        ){
            $this->codigoCarrera = $codigoCarrera;
            $this->nombreCarrera = $nombreCarrera;
            $this->cantidadClases = $cantidadClases;
            $this->clases = $clases;
            $this->jefe = $jefe;
            $this->coordinador = $coordinador;
        }



        /**
         * Get the value of nombreCarrera
         */ 
        public function getNombreCarrera()
        {
                return $this->nombreCarrera;
        }

        /**
         * Set the value of nombreCarrera
         *
         * @return  self
         */ 
        public function setNombreCarrera($nombreCarrera)
        {
                $this->nombreCarrera = $nombreCarrera;

                return $this;
        }

        public function __toString(){
            return $this->codigoCarrera.'///' .$this->nombreCarrera;
        }
    }
?>