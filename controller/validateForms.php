<?php

/**
 * Class to validate the deferents fields of the register forms
 *
 * @author Klvst3r
 */
class validateForms {
    
    function validaUserName ($usuario){
        echo '<script> validarNombreUsuario("'.$usuario.'") </script>';      
        return (preg_match('/^[a-zA-Z0-9_-]{4,15}$/', $usuario));
    }
    
    function validaEmail ($email){
        echo '<script> validarEmail("'.$email.'") </script>';
        return (preg_match('/^[a-zA-Z]+([\.]?[a-zA-Z0-9_-]+)*@[a-z0-9]+([\.-]+[a-z0-9]+)*\.[a-z]{2,4}$/', $email));
    }
    
    function validaName ($nombre){
        echo '<script> validarNombre("'.$nombre.'") </script>';
        return (($nombre=="")||(preg_match('/^[a-zA-Z áéíóúüÁÉÍÓÜÚ]{4,15}$/', $nombre)));      
    }
    
    function validaLastname ($apellidos){
        echo '<script> validarApellidos("'.$apellidos.'") </script>';
        return (($apellidos=="")||(preg_match('/^[a-zA-Z áéíóúüÁÉÍÓÜÚ]{4,15}$/', $apellidos))); 
    }
    
    function validaAge ($edad){
        echo '<script> validarEdad("'.$edad.'") </script>';
        return ((preg_match('/^[0-9]{1,3}$/', $edad))&&($edad<150)&&($edad>5));        
    }
    
    function validaPhone ($telefono){
        echo '<script> validarTelefono("'.$telefono.'") </script>';
        return (isset($telefono)||(preg_match('/^[a-zA-Z ]{4,15}$/', $telefono))); 
    }
    
    function validarPassword ($password){
        echo '<script> validarPassword("'.$password.'") </script>';
        return (strlen($password)>=4);
    }
    
    function validaSamePassword ($password, $password2){
        echo '<script> validarPasswordIguales("'.$password.'","'.$password2.'") </script>';
        return ($password == $password2);
    }
}
?>