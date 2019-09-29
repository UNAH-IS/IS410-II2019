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

        public function crearUsuario($db){
            $usuarios = $this->getData();
            $result = $db->getReference('users')
               ->push($usuarios);
               
            if ($result->getKey() != null)
                return '{"mensaje":"Registro almacenado","key":"'.$result->getKey().'"}';
            else 
                return '{"mensaje":"Error al guardar el registro"}';
        }
        //static sirve para llamar a un atributo o metodo de una clase sin instanciarla.
        public static function obtenerUsuarios($db){
            $result = $db->getReference('users')
                ->getSnapshot()
                ->getValue();

            echo json_encode($result);
        }

        public static function obtenerUsuario($db, $id){
            $result = $db->getReference('users')
                ->getChild($id)
                ->getValue();

            echo json_encode($result);
        }

        public static function eliminarUsuario($db, $id){
            $db->getReference('users')
                ->getChild($id)
                ->remove();
            echo '{"mensaje":"Se eliminó el elemento '.$id.'"}';
        }

        public function actualizarUsuario($db, $id){
            $result = $db->getReference('users')
                ->getChild($id)
                ->set($this->getData());
            
            if ($result->getKey() != null)
                return '{"mensaje":"Registro actualizado","key":"'.$result->getKey().'"}';
            else 
                return '{"mensaje":"Error al actualizar el registro"}';
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
