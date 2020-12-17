<?php 
	
	session_start();

	  if (isset($_SESSION['id_usuario'])) {
    header('Location: /PHP-CRUD');
	}
	require 'database.php';

	if(!empty($_POST['email']) && !empty($_POST['password'])){
		$records = $con->prepare('SELECT id,email,password FROM usuarios WHERE email=:email');
		$records->bindParam(':email',$_POST['email']);
		$records->execute();
		$resultados= $records->fetch(PDO::FETCH_ASSOC);

		$message = '';

		if (count($resultados) > 0 && password_verify($_POST['password'], $resultados['password'])) {
			$_SESSION['id_usuario'] = $resultados['id'];
			header('Location: /PHP-CRUD');

		}else{
			$message='Perdon , Los datos no coinciden';
		}

	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;1,500&display=swap" rel="stylesheet"> 
	<link rel="stylesheet" href="css/style.css">
</head>
<body background="img/edificios.jpg">
	<?php 	require 'header.php'; ?>
	<h1>Iniciar Sesion</h1>

	<?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>

	
	<form action="login.php" method="post">		
		<input type="text" name="email" placeholder = "Ingrese su Correo">
		<input type="password" name="password" placeholder = "Ingrese su Contraseña">
		<input type="submit" value="Iniciar Sesion" class="submit1">
		<span><a type="link" href="registrar.php">Registrar</a></span>

		
	</form>


</body>
</html>