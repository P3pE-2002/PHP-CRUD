<?php
	include 'database.php';
	$statement = $con->prepare("select id,email from usuarios");
	$statement->execute();

	if(isset($_POST['email'])){
		$est = $_POST['email'];
		echo $est; 
		$statement = $con->prepare("delete from usuarios where id=?");
		$statement -> bindparam(1,$est);
		$statement -> execute();
		header("Location: index.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="css/style.css">
	<!-- Pagina responsive -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Link de bootstrap-->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body background="img/edificios.jpg">>
	<?php 	require 'header.php'; ?>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				
				
				<h2>Eliminar usuarios</h2>				
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">			
				<form action="eliminar1.php" method="POST">
					<select name="email">
	       				<option value="0">Seleccione:</option>
		        		<?php
							while ($registro = $statement->fetch()){
						?>
						<option 
							value=" <?php echo $registro['id'] ?> "> <?php echo $registro['email'] ?>
						</option>
						<?php
							}
						?>
					</select>
					<input type="submit" value="Eliminar" class="btn btn-primary">	
				</form>					
				<?php
					echo '<br>';
					echo '<a href="index.php" class="btn">Volver</a>';	
				?>					
			</div>			
		</div>
	</div>
</body>
</html>