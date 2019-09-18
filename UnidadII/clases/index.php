
<?php
    //require_once('encabezado.html');
    require_once('class/class-persona.php');
    require_once('class/class-carrera.php');

    use \POO\Persona;
    use \POO\Carrera;
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
            'Raul Palma',
            'Emilson Acosta'
        ),
        'CU',
        'jperez@gmail.com'
    );

    
    $persona
        ->setNombre('Pedro')
        ->setApellido('Rodriguez');
    $persona->guardarRegistro();
    echo '<br>Carrera: ' . $persona->getCarrera()->getNombreCarrera();
?>