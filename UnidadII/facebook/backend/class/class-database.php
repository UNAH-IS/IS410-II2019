<?php
    require_once('../../vendor/autoload.php');
    use Kreait\Firebase\Factory;

    class Database{
        private $keyFile = '../../secret/fir-php-test-44e0c-3df2e2c5f6b8.json';
        private $URI = 'https://fir-php-test-44e0c.firebaseio.com/';
        private $db;

        public function __construct(){
            $firebase = (new Factory)
                ->withServiceAccount($this->keyFile)
                ->withDatabaseUri($this->URI)
                ->create();

            $this->db = $firebase->getDatabase();
        }

        public function getDB(){
            return $this->db;
        }
    }
?>