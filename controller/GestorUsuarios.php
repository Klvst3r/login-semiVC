<?php

include_once './modelo/Usuario.php';
include_once 'validadorFormularios.php';
/**
 * Clase para gestionar las operaciones con los usuarios en la base de datos.
 *
 * @author Klvst3r
 */
class GestorUsuarios {
    
    private $mysqli;
    
    public function __construct($conexion){
        $this->mysqli = $conexion;
    }
    
    /**
     * Comprueba si todos los datos del usuario son validos.
     * 
     * @param type $usuario Usuario que se quiere validar.
     * @return boolean 
     */
    public function validarUsuario($usuario){
        $validador = new validadorFormularios();

        return (
            $validador->validarNombreUsuario($usuario->getId()) &
            $validador->validarNombre($usuario->getNombre()) &
            $validador->validarApellidos($usuario->getApellidos()) &
            $validador->validarEmail($usuario->getEmail()) &
            $validador->validarEdad($usuario->getEdad()) &
            $validador->validarTelefono($usuario->getTelefono()) &
            $validador->validarPassword($usuario->getPassword()) &
            $validador->validarPasswordIguales($usuario->getPassword(), $usuario->getPassword2()) &
            !$this->existeUsuario($usuario->getId())    
        );
    }
    
    /**
     * Añade el usuario a la base de datos. 
     * 
     * @param type $usuario El usuario que se quiere añadir a la base de datos.
     * @return boolean 
     */
    public function insertarUsuario($usuario){
        // mysqli_real_escape_string -> Escapa caracteres especiales en la cadena dada.
        $consulta = sprintf("INSERT INTO usuarios (id, nombre, apellidos, email, edad, telefono, password) VALUES ('%s','%s','%s','%s','%d','%d','%s')",        
            $this->mysqli->real_escape_string($usuario->getId()),
            $this->mysqli->real_escape_string($usuario->getNombre()),
            $this->mysqli->real_escape_string($usuario->getApellidos()),
            $this->mysqli->real_escape_string($usuario->getEmail()),
            $this->mysqli->real_escape_string($usuario->getEdad()),
            $this->mysqli->real_escape_string($usuario->getTelefono()),
            // Encripta la password usando primero sha1 y al resultado concatenado con el usuario le aplica md5. 
            $this->mysqli->real_escape_string(md5(sha1($usuario->getPassword()).$usuario->getId()))
        );
        
        // Se ejecuta la consulta.
        $this->mysqli->query($consulta);  
        
        // Se comprueba que si se ha insertado.
        if(!$this->mysqli->affected_rows){
            die("<h3>Error: No se ha podido insertar el usuario en la base de datos.</h3>");
            return false;
        }
        else{
            return true;
        }
    }
    
    /**
     * Comprueba si existe algun usuario con el id pasado por parametro.
     * 
     * @param type $id Identidicador del usuario.
     * 
     * @return boolean 
     */
    public function existeUsuario($id){
        $consulta = sprintf("SELECT id FROM usuarios WHERE id='%s'",
            $this->mysqli->real_escape_string($id)
        );
        $result = $this->mysqli->query($consulta);
        
        if ($this->mysqli->affected_rows){
            // Si el usuario existe, forzamos la validacion del nombre de usuario para que falle, 
            // y se indique de igual forma que si asi hubiese sido.
            $validador = new validadorFormularios();
            $validador->validarNombreUsuario('-');
            $result->free();
            return true;
        }
        else{
            $result->free();
            return false;
        }
    }
    
    /**
     * Comprueba si existe algun usuario con los datos pasados como parametros. 
     * 
     * @param type $id Id del usuario.
     * @param type $pass Pass del usuario.
     * @return boolean 
     */
    public function comprobarUsuario($id,$pass){
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
    
    public function listarUsuarios(){
        //TODO
    }
}

?>
