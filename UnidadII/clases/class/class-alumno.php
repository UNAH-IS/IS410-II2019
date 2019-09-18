<?php
    namespace POO;
    require_once('class-persona.php');
    
    class Alumno extends Persona{
        private $cuenta;
        private $indice;
        public static $atributoEstatico = 9;

        public function __construct(
            $cuenta,
            $indice,
            $identidad,
            $nombre,
            $apellido,
            $genero,
            $fechaNacimiento,
            $carrera,
            $centroEstudios,
            $email
        ){
            parent::__construct(
                $identidad,
                $nombre,
                $apellido,
                $genero,
                $fechaNacimiento,
                $carrera,
                $centroEstudios,
                $email
            ); //Equivalente a super en Java

            $this->cuenta = $cuenta;
            $this->indice = $indice;
        }

        public function matricular(){
            echo '<br>Matricular al alumno '.$this->nombre.' '.$this->apellido;
        }

        public function cancelar(){}
        public function adicionar(){}


        //Sobreescritura de metodos
        public function __toString(){
            return parent::__toString()."($this->cuenta)"; 
        }

        public static function eliminarAlumno($id){
            echo 'Eliminar el alumno con código '.$id;
        }
    }
?>