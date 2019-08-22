<?php
    //sleep(15);
    //Si el archivo no existe lo crea
    if ($_POST!=null){
        $archivo = fopen('usuarios.csv','a+'); //r=Read ,w=Write, w+=Read/Write, a+=Append
        fwrite(
                $archivo, 
                $_POST["first-name"].",".
                $_POST["last-name"].",".
                $_POST["email"].",".
                $_POST["password"].",".
                $_POST["month"].",".
                $_POST["day"].",".
                $_POST["year"].",".
                $_POST["gender"]."\n"
        );
        fclose($archivo);
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
                $archivo = fopen('usuarios.csv','r');//Lectura
                while(($linea = fgets($archivo))){ //Retorna una linea
                    $partes = explode(',',$linea); //Divide una cadena utilizando el delimitador que se envia en el primera parametro, retorna un arreglo
                    echo    "<tr>
                                <td>$partes[0]</td>
                                <td>$partes[1]</td>
                                <td>$partes[2]</td>
                                <td>$partes[3]</td>
                                <td>$partes[4]</td>
                                <td>$partes[5]</td>
                                <td>$partes[6]</td>
                                <td>$partes[7]</td>
                            </tr>";

                }
                
                fclose($archivo);
            ?>
        </tbody>
    </table>

</body>
</html>