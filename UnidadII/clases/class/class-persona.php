<?php
    namespace POO;
    class Persona{
        protected $identidad;
        protected $nombre;
        protected $apellido;
        protected $genero;
        protected $fechaNacimiento;
        protected $carrera;
        protected $centroEstudios;
        protected $email;

        public function __construct(
            $identidad,
            $nombre,
            $apellido,
            $genero,
            $fechaNacimiento,
            $carrera,
            $centroEstudios,
            $email
        ){
            $this->identidad = $identidad;
            $this->nombre = $nombre;
            $this->apellido = $apellido;
            $this->genero = $genero;
            $this->fechaNacimiento = $fechaNacimiento;
            $this->carrera = $carrera;
            $this->centroEstudios = $centroEstudios;
            $this->email = $email;
        }

        public function getIdentidad(){
            return $this->identidad;
        }

        public function setIdentidad($identidad){
            $this->identidad = $identidad;
            return $this;
        }

        public function getNombre(){
            return $this->nombre;
        }

        public function setNombre($nombre){
            $this->nombre = $nombre;
            return $this;
        }


        public function getApellido(){
            return $this->apellido;
        }

        public function setApellido($apellido){
            $this->apellido = $apellido;
            return $this;
        }


        public function getGenero(){
                return $this->genero;
        }

        public function setGenero($genero){
            $this->genero = $genero;
            return $this;
        }


        public function getFechaNacimiento(){
            return $this->fechaNacimiento;
        }

        public function setFechaNacimiento($fechaNacimiento){
            $this->fechaNacimiento = $fechaNacimiento;
            return $this;
        }

        public function getCarrera(){
            return $this->carrera;
        }

        public function setCarrera($carrera){
            $this->carrera = $carrera;
            return $this;
        }


        public function getCentroEstudios(){
            return $this->centroEstudios;
        }

        public function setCentroEstudios($centroEstudios){
            $this->centroEstudios = $centroEstudios;
            return $this;
        }


        public function getEmail(){
            return $this->email;
        }

        public function setEmail($email){
            $this->email = $email;
            return $this;
        }

        public function guardarRegistro(){
            echo "Guardando registro de $this->nombre";
        }

        public function __toString(){
            return 'Persona:' . $this->nombre.' '.$this->apellido; 
        }

        public function matricular(){
            echo 'Matricular persona';
        }
    }

?>