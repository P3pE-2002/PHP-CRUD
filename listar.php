<!DOCTYPE html>
<html>
<head>
	<title>Listar Usuarios</title>

	<!-- Pagina responsive -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Link de bootstrap-->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

	<link rel="stylesheet" href="css/style2.css">
</head>
<body background="img/edificios.jpg">>
	<?php 	require 'header.php'; ?>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				
				<h3>Listado de usuarios</h3>				
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<table class="table default">
					<thead>
						<td>Id</td>
						<td>Usuario</td>
						
					</thead>
					<?php
						include 'database.php';
						$statement = $con->prepare("select * from usuarios");
						$statement -> execute();
						while ($registro = $statement->fetch()){
					?>
					<tr>
						<td>
							<?php
								echo ($registro['id']);
							?>	
						</td>
						<td>
							<?php
								echo ($registro['email']);
							?>	
						</td>
	
					</tr>						
					<?php
						}
					?>
				</table>
				<?php
					echo '<br>';
					echo '<a href="index.php" class="btn">Volver</a>';				
				?>
			</div>			
		</div>
	</div>
</body>
</html>