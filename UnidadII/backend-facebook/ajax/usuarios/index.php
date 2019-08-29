<?php
    $rutaArchivo = '../../data/usuarios.json';
    
    //Guardar, segun la arquitectura REST para guardar el metodo debe ser POST y la URL es /usuarios
    if ($_SERVER['REQUEST_METHOD'] =='POST'){
        header('Content-Type: application/json'); //tipos MIME
        $contenido = file_get_contents($rutaArchivo);
        $usuarios = json_decode($contenido,true);
        $usuarios[] = $_POST;

        $archivo=fopen($rutaArchivo,'w');
        fwrite($archivo, json_encode($usuarios));
        fclose($archivo);
        echo json_encode($_POST);
    }

    //Listar todos los usuarios
    if ($_SERVER['REQUEST_METHOD']=='GET' && !isset($_GET['id'])){ //
        header('Content-Type: application/json'); //tipos MIME
        $contenido = file_get_contents($rutaArchivo);
        echo $contenido;
    }

    //Listar solo un usuario mediante el id, en este caso se tomaría el indice
    if ($_SERVER['REQUEST_METHOD']=='GET' && isset($_GET['id'])){
        header('Content-Type: application/json'); //tipos MIME
        $contenido = file_get_contents($rutaArchivo);
        $usuarios = json_decode($contenido,true);
        echo json_encode($usuarios[$_GET['id']]);
    }

    //Eliminar un usuario especifico
    if ($_SERVER['REQUEST_METHOD']=='DELETE' && isset($_GET['id'])){
        header('Content-Type: application/json'); //tipos MIME
        
        $contenido = file_get_contents($rutaArchivo);
        $usuarios = json_decode($contenido,true);
        array_splice($usuarios, $_GET['id'], $_GET['id']);
        $archivo=fopen($rutaArchivo,'w');
        fwrite($archivo, json_encode($usuarios));
        fclose($archivo);
        echo '{"mensaje":"Se eliminara el elemento '.$_GET['id'].'"}';
    }

    //Actualizar, segun la arquitectura REST para guardar el metodo debe ser POST y la URL es /usuarios
    if ($_SERVER['REQUEST_METHOD'] =='PUT' && isset($_GET['id'])){
        $_PUT=array();
        if ($_SERVER['REQUEST_METHOD'] == 'PUT'){
            parse_str(file_get_contents("php://input"), $_PUT);
            //var_dump($_PUT);
        }
        
        header('Content-Type: application/json'); //tipos MIME
        $contenido = file_get_contents($rutaArchivo);
        $usuarios = json_decode($contenido,true);
        $usuarios[$_GET['id']] = $_PUT;

        $archivo=fopen($rutaArchivo,'w');
        fwrite($archivo, json_encode($usuarios));
        fclose($archivo);
        echo json_encode($_PUT);
    }

?>