<?php
    header('Content-Type: application/json'); //tipos MIME
    include_once('../../class/class-usuario.php');
    $rutaArchivo = '../../data/usuarios.json';
    
    //Guardar, segun la arquitectura REST para guardar el metodo debe ser POST y la URL es /usuarios
    if ($_SERVER['REQUEST_METHOD'] =='POST'){
        $u = new Usuario(
                $_POST['firstName'],
                $_POST['lastName'],
                $_POST['email'],
                $_POST['password'],
                $_POST['gender'],
                $_POST['birthdate']
            );
        $u->crearUsuario($rutaArchivo);
    }

    //Listar todos los usuarios
    if ($_SERVER['REQUEST_METHOD']=='GET' && !isset($_GET['id'])){ //
        Usuario::obtenerUsuarios($rutaArchivo);
    }

    //Listar solo un usuario mediante el id, en este caso se tomaría el indice
    if ($_SERVER['REQUEST_METHOD']=='GET' && isset($_GET['id'])){
        Usuario::obtenerUsuario($rutaArchivo,$_GET['id']);
    }

    //Eliminar un usuario especifico
    if ($_SERVER['REQUEST_METHOD']=='DELETE' && isset($_GET['id'])){
        Usuario::eliminarUsuario($rutaArchivo,$_GET['id']);
    }

    //Actualizar, segun la arquitectura REST para guardar el metodo debe ser POST y la URL es /usuarios
    if ($_SERVER['REQUEST_METHOD'] =='PUT' && isset($_GET['id'])){
        $_PUT=array();
        if ($_SERVER['REQUEST_METHOD'] == 'PUT')
            parse_str(file_get_contents("php://input"), $_PUT); //Convierte de URLEncoded a Arreglo Asociativo
    
        $u = new Usuario(
            $_PUT['firstName'],
            $_PUT['lastName'],
            $_PUT['email'],
            $_PUT['password'],
            $_PUT['gender'],
            $_PUT['birthdate']
        );
        $u->actualizarUsuario($rutaArchivo,$_GET['id']);
    }

?>