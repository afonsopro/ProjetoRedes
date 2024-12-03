<?php 
	session_start();
	//ligação ao servidor e à base de dados
	include "includes/ligamysql.php";
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
	<?php
    if(isset($_SESSION['climail'])){	
        require 'includes/menu1.php';
    }
    else{
        require 'includes/menu.php';
    }
	if(isset($_SESSION['climail'])){
		switch($cmd) {
			case 'home': require('includes/home.php'); break;
			case 'logout' : require('login/logout.php'); break;
			case 'sobre': require('includes/sobre.php'); break;
			case 'contactos': require('includes/contactos.php'); break;
			case 'favoritos': require('includes/favoritos.php'); break;
			case 'pesquisa': require('includes/pesquisa.php'); break;
			
			default    : echo "Opção invalida com sessão"; break;
			
		}
	}
	else{
		switch($cmd) {
			case 'home': require('includes/home.php'); break;
			case 'registar' : require('registar/registar.php'); break;
			case 'registar1' : require('registar/registar1.php'); break;
			case 'login' : require('login/login.php'); break;
			case 'login1' : require('login/login1.php'); break;
			case 'pesquisa' : require('includes/pesquisa.php'); break;
			case 'sobre' : require('includes/sobre.php'); break;
			case 'contactos' : require('includes/contactos.php'); break;
			case 'favoritos': require('login/login.php'); break;
			default : echo "Opção invalida sem sessão<br>Faça login em Início"; break;
	}
	}
	?>

</body>
</html>
