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
            if(!isset($_SESSION['id'])){
               header("Location:index.php");
            }
        ?>

        <article>
            <h1>Titulo</h1>
            <p>Este texto solo lo pueden leer si eres un usuario autentificado</p>
        </article>
    </body>
</html>
