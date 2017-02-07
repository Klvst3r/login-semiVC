<?php

/**
 * Description of Usuarios
 *
 * @author Klvst3r
 */
class Usuario {
    
    private $id;
    private $nombre;
    private $apellidos;
    private $email;
    private $edad;
    private $telefono;
    private $password;
    private $password2='';
      
     
    public function __construct($usuario,$nombre,$apellidos,$email,$edad,$telefono,$password='',$password2='') {
        $this->id=$usuario;
        $this->nombre=$nombre;
        $this->apellidos=$apellidos;
        $this->email=$email;
        $this->edad=$edad;
        $this->telefono=$telefono;
        $this->password=$password;   
        $this->password2=$password2;
    }
    
    public function getId(){
        return $this->id;
    }
    
    public function getEmail(){
        return $this->email;
    }
         
    public function getNombre(){
        return $this->nombre;
    }    

    public function getApellidos(){
        return $this->apellidos;
    }
    
    public function getEdad(){
        return $this->edad;
    }
    
    public function getTelefono(){
        return $this->telefono;
    }
    
    public function getPassword(){
        return $this->password;
    }
    
    public function getPassword2(){
        return $this->password2;
    }
    
}

?>
