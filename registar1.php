<?php
$nome=$_REQUEST['clinome'];
$info=$_REQUEST['climail'];
$obs=$_REQUEST['clitel'];
$des=$_REQUEST['clipass'];
echo "<br><br><br><br><br><br><br><br><br><br>";


if(is_uploaded_file($_FILES['Clifoto']['tmp_name'])) {
	// Foto no sistema de ficheiros
		$fo=$_FILES['Clifoto']['tmp_name'];
		$Clifoto=$_FILES['Clifoto']['name'];
		$dest="./Imagens/".$Clifoto;
		echo "<br><br><br><br><br><br><br><br><br><br>";

		if(copy($fo,$dest)){
			$sql= "insert into Cliente (clinome, climail, clitel, clipass, Clifoto )";
			$sql.=" values ('$nome', '$info', '$obs', md5('$des'), '$Clifoto')";
			echo "<br><br><br><br><br><br><br><br><br><br>";
			echo $sql;
			$lig->query($sql) or die("ERRO:Inserção na tabela Cliente");
			echo "<br><br><br><br><br><br><br><br><br><br>";
			echo "<meta http-equiv=refresh content=1;URL=index.php?cmd=login>";
		}
		else{
			echo "<br><br><br><br><br><br><br><br><br><br>";
			echo "Foto não carregada e Cliente não registado";
			echo "<meta http-equiv=refresh content=2;URL=index.php?cmd=home>";
		}
	}
else{
echo "<br><br><br><br><br><br><br><br><br><br>";
$sql= "insert into Cliente (clinome, climail, clitel, clipass)";
$sql.=" values('$nome', '$info', '$obs', md5('$des'))";
echo $sql;
$lig->query($sql) or die("ERRO:Inserção na tabela Cliente");
echo "<br><br><br><br><br><br><br><br><br><br>";
echo "<meta http-equiv=refresh content=1;URL=index.php?cmd=login>";
}
?> 