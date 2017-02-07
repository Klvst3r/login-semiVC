<?php

include_once './model/user.php';
include_once 'validateForms.php';
/**
 *  Class to manage operations with users in the Database
 *
 * @author Klvst3r
 */
class AdminUsers {
    
    private $mysqli;
    
    public function __construct($conexion){
        $this->mysqli = $conexion;
    }
    
    /**
     * Verify if all data users are valid.
     * 
     * @param type $usuario User who wants validate
     * @return boolean 
     */
    public function validaUser($usuario){
        $validator = new validatorForms();

        return (
            $validator->validaUserName($usuario->getId()) &
            $validator->validaName($usuario->getNombre()) &
            $validator->validaLastname($usuario->getApellidos()) &
            $validator->validaEmail($usuario->getEmail()) &
            $validator->validaAge($usuario->getEdad()) &
            $validator->validaPhone($usuario->getTelefono()) &
            $validator->validaPassword($usuario->getPassword()) &
            $validator->validaSamePassword($usuario->getPassword(), $usuario->getPassword2()) &
            !$this->existeUsuario($usuario->getId())    
        );
    }
    
    /**
     * Add the user in the Data Base
     * 
     * @param type $usuario the user who wants add to the database
     * @return boolean 
     */
    public function insertUser($usuario){
        // mysqli_real_escape_string -> Scape specials characters in the String.
            $consulta = sprintf("INSERT INTO usuarios (id, nombre, apellidos, email, edad, telefono, password) VALUES ('%s','%s','%s','%s','%d','%d','%s')",        
            $this->mysqli->real_escape_string($usuario->getId()),
            $this->mysqli->real_escape_string($usuario->getNombre()),
            $this->mysqli->real_escape_string($usuario->getApellidos()),
            $this->mysqli->real_escape_string($usuario->getEmail()),
            $this->mysqli->real_escape_string($usuario->getEdad()),
            $this->mysqli->real_escape_string($usuario->getTelefono()),
            // Encryot the password using first sha1 and he result is concat with the user aply md5
            $this->mysqli->real_escape_string(md5(sha1($usuario->getPassword()).$usuario->getId()))
        );
        
        // eject the Query
        $this->mysqli->query($consulta);  
        
        // Verify if the user was inserted
        if(!$this->mysqli->affected_rows){
            die("<h3>Error: No se ha podido insertar el usuario en la base de datos.</h3>");
            return false;
        }
        else{
            return true;
        }
    }
    
    /**
     * Verify if exist some user with the id passed by patrameter
     * 
     * @param type $id Id of the user
     * 
     * @return boolean 
     */
    public function existUser($id){
        
        $consulta = sprintf("SELECT id FROM usuarios WHERE id='%s'",

            $this->mysqli->real_escape_string($id)
        );

        $result = $this->mysqli->query($consulta);
        
        if ($this->mysqli->affected_rows){
            // If the User exist, we force the validation of the user name to fail, 
            // and result equal if if was made

            $validator = new validatorForms();

            $validator->validarNombreUsuario('-');

            $result->free();

            return true;
        }
        else{
            $result->free();
            return false;
        }
    }
    
    /**
     * Verify if exist some user with data passed as parameters
     * 
     * @param type $id Id of user
     * @param type $pass Pass of the user
     * @return boolean 
     */
    public function varifyUser($id,$pass){
        
        $consulta = sprintf("SELECT id, password FROM usuarios WHERE id='%s' AND password='%s'",
            $this->mysqli->real_escape_string($id),
            $this->mysqli->real_escape_string(md5(sha1($pass).$id))
        );
        
        $result = $this->mysqli->query($consulta);
        $row = $result->fetch_array();
        
        if ($this->mysqli->affected_rows){
            $result->free();
            return true;
        }
        else{
            $result->free();
            return false;
        }
    }
    
    public function listUsers(){
        //CODE
    }
}

?>
