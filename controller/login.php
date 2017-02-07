<?php

    include 'inc/config.php';
    require_once 'adminUsers.php';
    
    
    $conexion = new mysqli($servidor, $usuarioBD, $passwordBD, $baseDatos);
    $gestor = new GestorUsuarios($conexion);  
    
    if($gestor->comprobarUsuario($_POST['usuario'],$_POST['password'])){
        $conexion->close();
        // Iniciamos la sesion.
        session_start();
        $_SESSION['id'] = $_POST['usuario'];
        $_SESSION['password'] = $_POST['password'];
     
        header("Location:../home.php");
    }else{
        $conexion->close();
        header("Location:../index.php?error=error");
    }
?>
