<?php
    require_once('ser-vivo.php');
    interface Humano extends SerVivo{
        public function caminar();
        public function pensar();
    }

?>