<meta charset="utf-8"/>
<html>
	<head>
		<title> Index </title>
		<link rel="stylesheet" href="css/bootstrap.min.css">
	</head>
	<body>
		<div class="container" style="margin-top:20px;">
<?php
	include "connection.php";
	
	$senha = !empty($_POST['pass']) ? $_POST['pass'] : "";
	$iduser = "";
	if ($senha != ""){
		$keywd = "campanhas";
		$query = "SELECT * FROM `usuarios` where senha = '" . md5($senha . $keywd) . "' limit 1;";	
		
		$consulta = mysqli_query($conn, $query);
		if (mysqli_num_rows($consulta) > 0){
			while($retorno = mysqli_fetch_object($consulta)){
				echo "Bem vindo, " . utf8_encode($retorno->nome) . "!";
				$iduser = $retorno->idusuarios;
			}
		}		
	}
?>

		<?php
			if ($senha == ""){	
		?>
		<form method="post" action="index.php">
			<input type="password" name="pass" />
			<button type="submit">Entrar</button>
		</form>
		<?php
			} else {
		?>
		<br />
		<form class='form-inline' action='registrar.php' method='post'>
			<input name='iduser' type='hidden' value='<?php echo $iduser; ?>'>
			<button type="submit">Nova campanha</button>
		</form>
		<?php
			}
			
			$consulta = mysqli_query($conn,"SELECT * FROM `campanha` ORDER BY 'idcampanha';");
			$conta_linhas = mysqli_num_rows($consulta);

			if($conta_linhas > 0)
			{
				echo "<h3>Campanhas</h3>";
				echo "<table width=\"100%\" border=\"1\">";
				echo "<tr bgcolor=\"#DDD\"><td>ID</td><td>Campanha</td><td>Ações</td></tr>";
				while($retorno = mysqli_fetch_object($consulta))
				{
					echo "<tr><td>" . $retorno->idcampanha . "</td><td>" . utf8_encode($retorno->nomecampanha) . "</td><td>" .
					"<form class='form-inline' action='responder.php' method='post'><input name='idcampanha' type='hidden' value='" . $retorno->idcampanha . 
					"'><button type='submit' class='button'>Responder</button></form>";
					
					echo ($senha != "") ? "<form class='form-inline' action='registrar.php' method='post'><input name='idcampanha' type='hidden' value='" . $retorno->idcampanha . 
					"'><input name='iduser' type='hidden' value='" . $iduser ."'><button type='submit' class='button'>Editar</button></form>" : "";
					
					echo "</td></tr>";
					
				}
				echo "</table>";
			}
		?>
		</div>
	</body>
</html>