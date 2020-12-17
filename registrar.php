<?php

  require 'database.php';

  $message = '';

  if (!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['confirme_password'])) {
    $sql = "INSERT INTO usuarios (email, password) VALUES (:email, :password)";
    $statement = $con->prepare($sql);
    $statement->bindParam(':email', $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $statement->bindParam(':password', $password);

    


    if ($statement->execute()) {
      $message = 'Cuenta creada con exito';
    } else {
      $message = 'Perdon hubo un error al crear su cuenta';
    }  
  }


?>
<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;1,500&display=swap" rel="stylesheet"> 
	<link rel="stylesheet" href="css/style.css">
	<title>Registrar</title>
</head>
<body background="img/edificios.jpg">

	<?php require 'header.php'; ?>

	<?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>


	<h1>Crear Nuevo Usuario</h1>


	<form action="registrar.php" method="post">
    <div class="form-group">
      <label class="registro">Correo</label><br>
      <input type="text" name="email" placeholder = "Ingrese su Correo" class="form-control">
    </div>
    <div>
      <label class="registro1">Contraseña</label><br>
        <input type="password" name="password" placeholder = "Ingrese su Contraseña" class="form-control">
      
    </div>
    <div>
      <label class="registro2">Confirme Contraseña</label><br>
        <input type="password" name="confirme_password" placeholder = "Confirme su Contraseña" class="form-control">
      


        <div class="registro3">
      <span><a type="link 1" href="login.php">Iniciar Sesión</a></span>
     
      <input type="submit" value="Enviar" class="submit2">
      </div>   
	</form>

</body>
</html>