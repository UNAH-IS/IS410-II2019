<?php

    class Usuario{
        private $firstName;
        private $lastName;
        private $email;
        private $password;
        private $gender;
        private $birthdate;

        public function __construct(
            $firstName,
            $lastName,
            $email,
            $password,
            $gender,
            $birthdate
        ){
            $this->firstName = $firstName;
            $this->lastName = $lastName;
            $this->email = $email;
            $this->password = $password;
            $this->gender = $gender;
            $this->birthdate = $birthdate;
        }

        public function getFirstName(){
            return $this->firstName;
        }

        public function setFirstName($firstName){
            $this->firstName = $firstName;
        }

        public function getLastName(){
            return $this->lastName;
        }

        public function setLastName($lastName){
            $this->lastName = $lastName;
        }

        public function getEmail(){
            return $this->email;
        }

        public function setEmail($email){
            $this->email = $email;
        }

        public function getPassword(){
            return $this->password;
        }

        public function setPassword($password){
            $this->password = $password;
        }

        public function getGender(){
            return $this->gender;
        }

        public function setGender($gender){
            $this->gender = $gender;
        }

        public function getBirthdate(){
            return $this->birthdate;
        }

        public function setBirthdate($birthdate){
            $this->birthdate = $birthdate;
        }

        public function __toString(){
            return json_encode($this->getData());
        }

        public function crearUsuario($rutaArchivo){
            $contenido = file_get_contents($rutaArchivo);
            $usuarios = json_decode($contenido,true);
            $usuarios[] = $this->getData();
            $archivo=fopen($rutaArchivo,'w');
            fwrite($archivo, json_encode($usuarios));
            fclose($archivo);
            echo json_encode($this->getData());
        }
        //static sirve para llamar a un atributo o metodo de una clase sin instanciarla.
        public static function obtenerUsuarios($rutaArchivo){
            $contenido = file_get_contents($rutaArchivo);
            echo $contenido;
        }

        public static function obtenerUsuario($rutaArchivo, $id){
            $contenido = file_get_contents($rutaArchivo);
            $usuarios = json_decode($contenido,true);
            if ($id>(sizeof($usuarios)-1))
                echo '{"mensaje":"El codigo no existe"}';
            else
                echo json_encode($usuarios[$id]);
        }

        public static function eliminarUsuario($rutaArchivo, $id){
            $contenido = file_get_contents($rutaArchivo);
            $usuarios = json_decode($contenido,true);
            array_splice($usuarios, $id, $id); //Error al eliminar el elemento 0
            $archivo=fopen($rutaArchivo,'w');
            fwrite($archivo, json_encode($usuarios));
            fclose($archivo);
            echo '{"mensaje":"Se eliminó el elemento '.$id.'"}';
        }

        public function actualizarUsuario($rutaArchivo, $id){
            $contenido = file_get_contents($rutaArchivo);
            $usuarios = json_decode($contenido,true);
            $usuarios[$id] = $this->getData();

            $archivo=fopen($rutaArchivo,'w');
            fwrite($archivo, json_encode($usuarios));
            fclose($archivo);
            echo json_encode($this->getData());
        }

        //Retornar un arreglo asociativo con todos los atributos de la clase
        public function getData(){
            $result['firstName'] = $this->firstName;
            $result['lastName'] = $this->lastName;
            $result['email'] = $this->email;
            $result['password'] = $this->password;
            $result['gender'] = $this->gender;
            $result['birthdate'] = $this->birthdate;
            return $result;
        }
    }

?>
