<?php 
	session_start();
	//ligação ao servidor e à base de dados
	include "ligamysql.php";
	//indicação do script a ser executado, cmd é definido aqui e de seguida verifica-se no switch o script a executar
	if (isset($_REQUEST['cmd'])) $cmd=$_REQUEST['cmd']; else $cmd='home';
	//echo $_REQUEST['cmd'];
?>

<!DOCTYPE html>
<html lang="pt">
<head>
  <title>LealCars - Compre ou venda aqui o seu carro</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
</head>
<body>
	<!--Inclusão do menu apartir de um ficheiro externo-->
	<?php	
		include 'menu.php';
	?>
	<br><br>
    <?php
		switch($cmd) {
			case 'home': require('home.php'); break;
			//Cliente
			case 'add-cli' : require('cliente/addcli.php'); break;
			case 'ins-cli' : require('cliente/inscli.php'); break;
			default : echo "Opção invalida sem sessão<br>Faça login em Início"; break;
		}
	?>
</body>
</html>