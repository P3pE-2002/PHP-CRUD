<?php 
	session_start();

	require 'database.php';

	if (isset($_SESSION['id_usuario'])) {
		$records = $con->prepare('SELECT id,email,password FROM usuarios WHERE id= :id');
		$records->bindParam(':id', $_SESSION['id_usuario']);
		$records->execute();
		$resultados = $records->fetch(PDO::FETCH_ASSOC);

		$usuario= null;

		if (count($resultados) > 0 ){
			$usuario = $resultados;
		}

	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Siatec</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;1,500&display=swap" rel="stylesheet"> 

	<link rel="stylesheet" href="css/style.css">
</head>
<body background="img/edificios.jpg">

	<?php 	require 'header.php'; ?>

	<?php if(!empty($usuario)): ?>
		<br>Bienvenido: <?= $usuario['email']; ?>
		<p>--------------------------------------------</p>
		<p>Iniciaste sesion con exito</p>
		<p>--------------------------------------------</p>
		<p></p><a type="logout" href="cerrar_sesion.php">Cerrar Sesion</a></p>
		
	<?php else: ?>

	<h1>Acceso al Sistema</h1>

	
		
	<img src="img/user.jpg" class="img-fluid">

	<div >
		<p>-----------------------------------------------</p>
	<a  type="link in" href="login.php">Ingresar</a>	
	<a type="link re" href="registrar.php">Registrar</a>
	<a href="eliminar1.php" class="link_el">Eliminar</a>
	<p>-----------------------------------------------</p>
	<a href="listar.php" class="link_lis">Listar</a>

	
	<?php endif; ?>
	</div>
	


</body>
</html>

	
			