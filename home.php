<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Login</title>

        <link rel="stylesheet" type="text/css" href="css/style.css"/>

    </head>
    <body>
        <?php
        session_start();
        // Se comprueba si ya se habia iniciado la sesion.
        if(isset($_SESSION['id'])){
            echo '
            <div id="formulario_login">
            <h2>Login</h2>
            <br/>
            ';


            echo 'Sesion iniciada correctamente.<br />';
            echo 'Usuario: '.$_SESSION['id'].'<br />';
            echo 'Password: '.$_SESSION['password'].'<br />';

            echo "<br />";

            echo "
            <div id='link_logout'>
            <a href='logout.php'> Salir </a>
            </div>            
             </div>";


        }
        else{
           header("Location:index.php");
        }
        ?>
    </body>
</html>
