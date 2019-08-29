<?php
    //echo '{"mensaje":"Esta es la respuesta del servidor"}';
    
    //sleep(15);
    //Si el archivo no existe lo crea
    if ($_POST!=null){
        $contenidoArchivo = file_get_contents('../data/usuarios.json');//Retorna tooooooooodo el contenido del archivo
        $usuarios = json_decode($contenidoArchivo, true);
        $usuarios[] = $_POST;
        //var_dump($usuarios);

        $archivo = fopen('../data/usuarios.json','w'); //r=Read ,w=Write, w+=Read/Write, a+=Append
        fwrite(
                $archivo, 
                json_encode($usuarios)
        );
        fclose($archivo);
        //Si llega a este punto guardo con exito
        echo json_encode($_POST);
    }
?>