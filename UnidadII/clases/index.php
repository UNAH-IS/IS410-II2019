
<?php
    //require_once('encabezado.html');
    require_once('class/class-persona.php');
    require_once('class/class-carrera.php');
    require_once('class/class-alumno.php');

    use \POO\Persona;
    use \POO\Carrera;
    use \POO\Alumno;
    /*
    //Pruebas de la clase persona
    $persona = new Persona(
        '1154554545',
        'Juan',
        'Perez',
        'M',
        '12/12/2012',
        new Carrera(
            115,
            'Ing en Sistemas',
            56,
            [],
            new Persona(
                '2323',
                'Raul',
                'Palma',
                'M',
                '12/12/2012',null,
                'CU',
                'rpalma@gmail.com'
            ),
            'Emilson Acosta'
        ),
        'CU',
        'jperez@gmail.com'
    );

    /*
    $persona
        ->setNombre('Pedro')
        ->setApellido('Rodriguez');
    $persona->guardarRegistro();
    echo '<br>Carrera: ' . $persona->getCarrera()->getNombreCarrera();
    */

    /*
    //Pruebas de clase alumno
    $alumno = new Alumno(
                '456454',
                64.5,
                '1211546565',
                'Juan',
                'Perex',
                'M',
                '12/12/2012',
                'Ing en Sistemas',
                'CU',
                'jperez@gmail.com'
    );

    echo 'NOMBRE: ' . $alumno->getNombre();
    $alumno->matricular();

    echo '<br>Alumno:'.$alumno;*/

    Alumno::eliminarAlumno(44);
    Alumno::$atributoEstatico = 5;
    $alumno = new Alumno(
        '456454',
        64.5,
        '1211546565',
        'Juan',
        'Perex',
        'M',
        '12/12/2012',
        'Ing en Sistemas',
        'CU',
        'jperez@gmail.com'
    );
    $alumno::$atributoEstatico = 10;
    //5,10,9
    echo '<br>Resultado 1: ' .Alumno::$atributoEstatico;//10
    echo '<br>Resultado 2: ' .$alumno::$atributoEstatico;//10
    $alumno->matricular();
?>