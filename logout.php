<?php
session_start();
session_destroy();
?>


<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>Login</title>
		<link rel="stylesheet" href="css/style.css" />
		<script>
			location.href = "index.php";
		</script>
	</head>
<body>
<div class="contenedor">
    <h1>BIENVENIDO : <?php echo 'Se cierra sesión, saliendo del sistema...'; ?></h1><hr>
    
    <p> </p>
</div>
</body>
</html> 