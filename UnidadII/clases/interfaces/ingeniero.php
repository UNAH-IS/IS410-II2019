<?php
    require('humano.php');
    class Ingeniero implements Humano{
        public function vivir(){
            echo  "Cuando puede";
        }
        public function morir(){
            echo  "Todos los días";
        }
        public function reproducir(){
            echo  "Nunca :V";
        }
        public function caminar(){
            echo  "Muy lento";
        }
        public function pensar(){
            echo  "De vez en cuando";
        }
    }

?>