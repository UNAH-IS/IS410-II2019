<?php
    $contenidoUsuarios = file_get_contents('../data/usuarios.json');
    //$usuarios = json_decode($contenidoUsuarios,true);
    echo $contenidoUsuarios;    
?>