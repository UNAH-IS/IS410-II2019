<?php
    //sleep(15);
    //Si el archivo no existe lo crea
    if ($_POST!=null){
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
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    
    
    <table class="table">
        <thead>
            <tr>
                <th>First name</th>
                <th>Last name</th>
                <th>Email</th>
                <th>Password</th>
                <th>Month</th>
                <th>Day</th>
                <th>Year</th>
                <th>Genero</th>
            </tr>
        </thead>
        <tbody>
        
            <?php
                //var_dump($_POST);
                $contenidoArchivo = file_get_contents('usuarios.json');//Retorna tooooooooodo el contenido del archivo
                $usuarios = json_decode($contenidoArchivo, true);
                for ($i=0; $i < sizeof($usuarios); $i++) { 
                    echo sprintf("<tr>
                            <td>%s</td>
                            <td>%s</td>
                            <td>%s</td>
                            <td>%s</td>
                            <td>%s</td>
                            <td>%s</td>
                            <td>%s</td>
                            <td>%s</td>
                        </tr>",
                        $usuarios[$i]['first-name'],
                        $usuarios[$i]['last-name'],
                        $usuarios[$i]['email'],
                        $usuarios[$i]['password'],
                        $usuarios[$i]['month'],
                        $usuarios[$i]['day'],
                        $usuarios[$i]['year'],
                        $usuarios[$i]['gender']
                    );
                }
                /*foreach ($usuario as $llave => $valor) {
                    # code...
                }*/
                
            ?>
        </tbody>
    </table>
    <pre>
        <?php
            // var_dump($usuarios); 
        ?>
    </pre>

</body>
</html>