<?php
SESSION_START();

if(isset($_SESSION["username"])){
	
	unset($_SESSION["username"]);
	unset($_SESSION["uid"]);
	header('Location: ../index.php');
	exit();
}
else{
	echo "You are not logged in";
}
	
	



?>