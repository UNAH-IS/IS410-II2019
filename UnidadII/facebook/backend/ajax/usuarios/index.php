<?php
    header('Content-Type: application/json'); //tipos MIME
    include_once('../../class/class-usuario.php');
    require_once('../../class/class-database.php');
    
    $database = new Database();

    //Guardar, segun la arquitectura REST para guardar el metodo debe ser POST y la URL es /usuarios
    if ($_SERVER['REQUEST_METHOD'] =='POST'){
        $u = new Usuario(
                $_POST['firstName'],
                $_POST['lastName'],
                $_POST['email'],
                $_POST['password'],
                $_POST['gender'],
                array(
                    'day' => $_POST['day'],
                    'month' => $_POST['month'],
                    'year' => $_POST['year']
                )
            );
        echo $u->crearUsuario($database->getDB());        
    }

    //Listar todos los usuarios
    if ($_SERVER['REQUEST_METHOD']=='GET' && !isset($_GET['id'])){ //
        Usuario::obtenerUsuarios($database->getDB());
    }

    //Listar solo un usuario mediante el id, en este caso se tomaría el indice
    if ($_SERVER['REQUEST_METHOD']=='GET' && isset($_GET['id'])){
        Usuario::obtenerUsuario($database->getDB(),$_GET['id']);
    }

    //Eliminar un usuario especifico
    if ($_SERVER['REQUEST_METHOD']=='DELETE' && isset($_GET['id'])){
        Usuario::eliminarUsuario($database->getDB(),$_GET['id']);
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
            array(
                'day' => $_PUT['day'],
                'month' => $_PUT['month'],
                'year' => $_PUT['year']
            )
        );
        echo $u->actualizarUsuario($database->getDB(),$_GET['id']);
    }

?>