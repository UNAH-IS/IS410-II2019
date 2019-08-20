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


        //$arreglo = array();
        /*$arreglo[0] = 124;
        $arreglo[1] = 45;
        $arreglo[2] = 454;
        $arreglo[3] = 'Juan';*/

        $arreglo[] = 124; //0
        $arreglo[] = 45; //1
        $arreglo[] = 454; //2
        $arreglo['nombre'] = 'Juan'; //nombre
        $arreglo['apellido'] = 'Perez';

        /*
        var persona = {
            nombre:'Juan',
            apellido:'Perez',
            eda:35,
            fechaNacimiento:{
                dia:11,
                mes:11,
                anio:2012
            }
        }
        
        */
        echo '<hr>';
        /*$fechaNacimiento['dia'] = 11;
        $fechaNacimiento['mes'] = 11;
        $fechaNacimiento['anio'] = 2012;
        $persona['nombre'] = 'Juan';
        $persona['apellido']='Perez';
        $persona['edad']=35;
        $persona['fechaNacimiento']=$fechaNacimiento;*/
        
        $persona = array(
            'nombre'=>'Pedro',
            'apellido'=>'Perez',
            'edad'=>35,
            'fechaNacimiento'=>array(
                'dia'=>11,
                'mes'=>11,
                'anio'=>2012
            )
        );
        
        //como acceder al día:
        echo 'Día: '.$persona['fechaNacimiento']['dia'].'<br>';

        echo 'Nombre de la persona: ' . $persona['nombre']. '<br>';

        /*for ($i=0; $i < sizeof($arreglo); $i++) { 
            echo "Item: ".$arreglo[$i]."<br>";
        }*/

    ?>

    <pre><?php var_dump($persona); ?></pre>
    <hr>
    <?php
        $cadenaJSON =  json_encode($persona);//Convierte un arreglo en una cadena en formato json        
        echo $cadenaJSON;

        $arregloResultante = json_decode($cadenaJSON,true);//Convierte una cadena en formato JSON a un arreglo asociativo, el true es para utilizar indices asociativos
        echo '<pre>';
        var_dump($arregloResultante);
        echo '</pre>';

    ?>
    <hr>
    <?php
        //foreach(arreglo as llave => valor)
        foreach ($persona as $llave => $valor) { //Mostraría error en la fecha de nacimiento porque es un arreglo y no lo podría imprimir
            echo "$llave : $valor<br>";
        }
    ?>
</body>
</html>