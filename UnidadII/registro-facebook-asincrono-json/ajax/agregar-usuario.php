<?php
    //sleep(15);
    //Si el archivo no existe lo crea
    /*if ($_POST!=null){
        if ($_POST['accion']=='registrar'){
            $contenidoArchivo = file_get_contents('usuarios.json');//Retorna tooooooooodo el contenido del archivo
            $usuarios = json_decode($contenidoArchivo, true);
            $usuarios[] = $_POST;
            //var_dump($usuarios);

            
            $archivo = fopen('usuarios.json','w'); //r=Read ,w=Write, w+=Read/Write, a+=Append
            fwrite(
                    $archivo, 
                    json_encode($usuarios)
            );
            fclose($archivo);
        }
    }*/
?>