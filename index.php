<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
</head>
 
<body>
    
    <?php
        session_start();
        // check if the user beggin session
        if(isset($_SESSION['id'])){
            header("Location:home.php");
        }
    ?>
   
    <section>
        <div id="formulario_login">
            <h2>Login</h2>
        	<form action="controller/login.php" method="POST">
                <div class="fieldForm">
                    <label for="usuario">Usuario:</label>
                    <input type='text' name="usuario" maxlength="15"/>
                </div>
                <div class="fieldForm">
                    <label for="password">Contraseña:</label>
                    <input type='password' name="password" maxlength="20"/>
                </div>
                <div class="buttonForm">
                    <input type="submit" id="login" name="login" value="Entrar">
                </div>  
                <div id="enlace_registro">
                    <a href="reg_user.php"> Registrarse </a>
                </div>
            </form> 
               
            <?php
                if(!empty($_GET['error'])) {
            ?>
                <p class="errorUsuario">Usuario o pasword incorrectos</p>
            <?php } ?>
        </div>
    </section>
</body>
</html>
