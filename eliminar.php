<?php  
	require 'database.php';
	$statement = $con->prepare("select id,email from usuarios");
	$statement->execute();
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>

	<!-- Pagina responsive -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Link de bootstrap-->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1>Siatec</h1>
				<h2>Acceso al sistema</h2>
				<h3>Eliminar usuarios</h3>				
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">			
				<form action="eliminar.php" method="POST">
					<select>
       				<option value="0">Seleccione:</option>
        			<?php
						while ($registro = $stm->fetch()){
							echo '<option value="'.$registro['id'].'">'.$registro['usuario'].'</option>';
						}
					?>
				</select>	
				</form>					
				<?php
					echo '<br>';
					echo '<a href="frmusuarios.html">Volver</a>';	
				?>					
			</div>			
		</div>
	</div>
</body>
</html>