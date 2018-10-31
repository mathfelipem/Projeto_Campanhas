<?php
	include "connection.php";
	
	$acao 		= $_POST['acao'];
	$idusuarios = $_POST['idusuarios'];
	$idcampanha = $_POST['idcampanha'];
	$campanha 	= $_POST['campanha'];
	
	if (empty($idusuarios)){
		header("location:index.php");
	}
	
	if ($acao == "editCampanha"){
		$query = "UPDATE `campanha` SET `nomecampanha`='" . utf8_decode($campanha) . "', `usuarios_idusuarios`='" . $idusuarios . "' WHERE `idcampanha`='" . $idcampanha . "';";		
	}
	
	if ($acao == "novaCampanha"){
		$query = "INSERT INTO `campanha` (`nomecampanha`, `usuarios_idusuarios`) VALUES ('" . utf8_decode($campanha) . "', '" . $idusuarios . "');";		
	}
	
	if ($conn->query($query) === TRUE){
		header("location:index.php");
	}
	
	
?>