<meta charset="utf-8"/>
<html>
	<head>
		<title>  </title>
		<link rel="stylesheet" href="css/bootstrap.min.css">
	</head>
	<body>
		<div class="container" style="margin-top:20px;">
<?php
	include "connection.php";
	
	$idcampanha = !empty($_POST['idcampanha']) ? $_POST['idcampanha'] : "";
	$idusuarios = !empty($_POST['iduser']) ? $_POST['iduser'] : "";
	if (empty($idusuarios)){
		header("location:index.php");
	}
	$acao = "novaCampanha";
	if ($idcampanha != ""){
		$keywd = "campanhas";
		$query = "SELECT * FROM `campanha` where idcampanha = '" . $idcampanha . "' limit 1;";	
		$campanha;
		
		$consulta = mysqli_query($conn, $query);
		if (mysqli_num_rows($consulta) > 0){
			while($retorno = mysqli_fetch_object($consulta)){
				$campanha = $retorno;
			}
			$acao = "editCampanha";
		}
		
	}
?>
		<form method="post" action="acoes.php">
			<input 	type="hidden" 	name="idcampanha" 	value="<?php echo !empty($idcampanha) ? $idcampanha : "" ; ?>" />
			<input 	type="hidden" 	name="idusuarios" 	value="<?php echo $idusuarios; ?>" />
			<input 	type="hidden" 	name="acao"		 	value="<?php echo $acao; ?>" />
			<input 	type="text" 	name="campanha"		value="<?php echo (!empty($campanha)) ? utf8_encode($campanha->nomecampanha) : ""; ?>" />
			<button type="submit">Salvar</button>			
		</form>
<?php
	if (!empty($campanha)){
		$query = "SELECT * FROM `perguntas` where campanha_idcampanha = '" . $idcampanha . "'";
		
		$consulta = mysqli_query($conn, $query);
		if (mysqli_num_rows($consulta) > 0){
			echo "<h3>Perguntas</h3>";
			echo "<table width=\"100%\" border=\"1\">";
			echo "<tr bgcolor=\"#DDD\"><th>ID</th><th>Pergunta</th><th>Ações</th></tr>";
			while($retorno = mysqli_fetch_object($consulta)){
				echo "<tr><td>" . $retorno->idperguntas . "</td><td>" . utf8_encode($retorno->pergunta) . "</td>";
				echo "<td>";
				
				echo "<form method='post' action='perguntas.php'>";
				echo "<input type='hidden' name='idcampanha' 	value='" . $idcampanha . "' />";
				echo "<input type='hidden' name='idusuarios' 	value='" . $idusuarios . "' />";
				echo "<input type='hidden' name='idperguntas' 	value='" . $retorno->idperguntas . "' />";
				echo "<input type='hidden' name='acao' 			value='editPergunta' />";
				echo "<button type='submit'>Editar Pergunta</button>";
				
				echo "</form>";
				
				echo "</td></tr>";
			}
			echo "</table>";
		}
?>
		<br />
		<form method="post" action="perguntas.php">
			<input 	type="hidden" 	name="idcampanha" 	value="<?php echo $idcampanha; ?>" />
			<input 	type="hidden" 	name="idusuarios" 	value="<?php echo $idusuarios; ?>" />
			<input 	type="hidden" 	name="acao"			value="addPergunta" />
			<button type="submit">Adicionar pergunta</button>			
		</form>
<?php
	}
?>
		</div>
	</body>
</html>