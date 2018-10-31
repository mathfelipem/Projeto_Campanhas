<meta charset="utf-8"/>
<html>
	<head>
		<title>  </title>
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<script src="js/jquery.js"></script>
	</head>
	<body>
		<div class="container" style="margin-top:20px;">
<?php
	include "connection.php";
	
	$idcampanha = !empty($_POST['idcampanha']) 	? $_POST['idcampanha'] 	: "";
	$idusuarios = !empty($_POST['idusuarios']) 	? $_POST['idusuarios'] 	: "";
	$acao 		= !empty($_POST['acao']) 		? $_POST['acao'] 		: "";
	if (empty($idusuarios)){
		header("location:index.php");
	}
?>
		<form method="post" action="regpergunta.php">
			<div class="col-md-6">Pergunta<br /><textarea name="pergunta" class="form-control" style="resize:none;" rows="4"></textarea></div><br />
			<div class="col-md-6">
				Alternativas <br />
				<input 	type="text" 	name="resposta[]" 	class="form-control respa" placeholder="a)"/>
				<input 	type="text" 	name="resposta[]" 	class="form-control respb" placeholder="b)"/>
				<input 	type="text" 	name="resposta[]" 	class="form-control respc" placeholder="c)" hidden="hidden" />
				<input 	type="text" 	name="resposta[]" 	class="form-control respd" placeholder="d)" hidden="hidden" />
				<input 	type="text" 	name="resposta[]" 	class="form-control respe" placeholder="e)" hidden="hidden" />
				<br />
				<div class="row">
					<div class="col-md-4"></div>
					<button type="button" name="btnMais" class="btn-success col-md-4 btnMais">Mais alternativas</button>
					<div class="col-md-4"></div>
				</div><br />
				<button type="submit">Salvar</button>
			</div>
		</form>

		</div>
	</body>
	<script >
		$( ".btnMais" ).click(function() {
		  alert( "Handler for .click() called." );
		  
		});
	</script>
</html>