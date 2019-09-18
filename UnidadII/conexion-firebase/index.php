<?php

require_once __DIR__.'/vendor/autoload.php';

use Kreait\Firebase\Factory;

$firebase = (new Factory)
    ->withServiceAccount('./secret/fir-php-test-44e0c-3df2e2c5f6b8.json')
    ->withDatabaseUri('https://fir-php-test-44e0c.firebaseio.com/')
    ->create();

$database = $firebase->getDatabase();

$newPost = $database
    ->getReference('users')
    ->push([
        'firstName'=>'Juan',
        'lastName'=>'Perez',
        'birthDate'=>'12/12/2012'
    ]);

?>x