<?php
// função Session_start() é a 1ª instrução do index.php
$u=$_REQUEST['climail'];
$p=$_REQUEST['clipass'];
$sql="select * from Cliente where climail='$u' and clipass=md5('$p')";
$res=$lig->query($sql);
if ($res->num_rows == 1) {// Encontrou apenas 1 utilizador
	$lin = $res->fetch_array();
	$_SESSION['clinome']  = $lin['clinome'];
	$_SESSION['climail'] = $lin['climail'];
	$_SESSION['Clifoto']  = $lin['Clifoto'];
	echo "<meta http-equiv=refresh content=0;URL=index.php?cmd=home>";	
}

else{
	echo "<meta http-equiv=refresh content=0;URL=index.php?cmd=login>";
}
?>