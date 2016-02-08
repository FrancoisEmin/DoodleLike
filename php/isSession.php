<?php

session_start();

if(isset($_SESSION["utilisateur"])){
	echo("ok");
}
else{
	echo("no");
}



?>