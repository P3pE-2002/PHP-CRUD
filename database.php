<?php 

	$server = 'localhost';
	$username = 'root';
	$password = '';
	$database = 'phpcrud';



	try{
		$con= new PDO("mysql:host=$server;dbname=$database;",$username,$password);
	}catch(PDOException $e){
		die('Conexion Fallida'.$e->getMessage());

	}
?>