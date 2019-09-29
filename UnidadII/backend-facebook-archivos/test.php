<?php

    include_once('class/class-usuario.php');
    $u = new Usuario('Juan','Perez','jperez@gmail.com','asd.456','M','12/12/2012');
    /*echo 'Nombre: ' . $u->getFirstName();
    $u->email = 'otro@gmail.com';
    echo 'Correo'.$u->email;*/

    echo $u;

?>