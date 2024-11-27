<?php
unset($_SESSION["climail"]);
session_destroy();
if(!isset($_SESSION["climail"]))
echo "<meta http-equiv=refresh content=0;URL=index.php?cmd=home>";
?>
