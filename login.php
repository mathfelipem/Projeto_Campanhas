<?php
	include "connection.php";
	
	$senha = $_POST['pass'];
	$keywd = "campanhas";
	$query = "SELECT * FROM `usuarios` where senha = '" . md5($senha . $keywd) . "' limit 1;";	
	
	$consulta = mysqli_query($conn, $query);
	if (mysqli_num_rows($consulta) > 0){
		while($retorno = mysqli_fetch_object($consulta)){
			echo "Bem vindo, " . utf8_encode($retorno->nome) . "!";
		}
	} else {
		header("location:index.php");
	}
	
?>