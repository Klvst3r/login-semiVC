<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        session_start();
        // Se comprueba si ya se habia iniciado la sesion.
        if(isset($_SESSION['id'])){
            echo 'Sesion iniciada correctamente.<br />';
            echo 'Usuario: '.$_SESSION['id'].'<br />';
            echo 'Password: '.$_SESSION['password'].'<br />';

            echo "<br />";

            echo "Salir";
        }
        else{
           header("Location:index.php");
        }
        ?>
    </body>
</html>
