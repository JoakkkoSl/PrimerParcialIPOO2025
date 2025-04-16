<?php
class Persona{
    //atributos;
    private string $nombre;
    private string $apellido;
    private string $direccion;
    private string $email;
    private string $telefono;
    
    //metodo constructor que recibe los valores iniciales para los atributos;
    public function __construct($pNombre, $pApellido, $pDireccion, $pEmail, $pTelefono){
        $this -> nombre = $pNombre;
        $this -> apellido = $pApellido;
        $this -> direccion = $pDireccion;
        $this -> email = $pEmail;
        $this -> telefono = $pTelefono;
}

//getter´s (observadoras);
    public function getNombre(){
        return $this -> nombre;
    }  
    public function getApellido(){
        return $this -> apellido;
    }
    public function getDireccion(){
        return $this -> direccion;
    }
    public function getEmail(){
        return $this -> email;
    }
    public function getTelefono(){
        return $this -> telefono;
    }

    //setter´s (modificadoras);
    public function setNombre($pNombre){
        $this -> nombre = $pNombre;
    }
    public function setApellido($pApellido){
        $this -> apellido = $pApellido;
    }
    public function setDireccion($pDireccion){
        $this -> direccion = $pDireccion;
    }
    public function setEmail($pEmail){
        $this -> email = $pEmail;
    }
    public function setTelefono($pTelefono){
        $this -> telefono = $pTelefono;
    }

    //metodo __toString() que devuelve una cadena de texto con los valores de los atributos;
    public function __toString(){
        return "Nombre de la Persona: " . $this -> getNombre() . "\n" .
            "Apellido de la Persona: " . $this -> getApellido() . "\n" .
            "Direccion de la Persona: " . $this -> getDireccion() . "\n" .
            "Email de la Persona: " . $this -> getEmail() . "\n" .
            "Telefono de la Persona: " . $this->getTelefono() . "\n";
    }
}
?>