<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php 
        //Comentarios de una linea
        /*
        Comentarios de multiples lineas
        */
        #Otros comentarios con numeral
        //echo "<script>alert('Este es un mensaje JS que ha sido creado desde PHP');</script>"
        
        $nombre = "Pedro";
        $apellido = "Perez";
        //echo "<h1>Hola ".$nombre."</h1>";
        echo "<h1>Hola $nombre</h1>";
        //echo printf('<h1>Hola %s %s</h1>',$nombre, $apellido);

    
    ?>
</body>
</html>