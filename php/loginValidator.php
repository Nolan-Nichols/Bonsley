<?php
SESSION_START();
include("connect.php");
$email = $_POST["email"];
$pw = $_POST["pw"];

//Sanitize and stuff!

$sql = "SELECT id, username, email_address FROM users WHERE email_address = '$email'";

$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);

$count = mysqli_num_rows($result);

if($count == 1){
	$_SESSION["uid"] = $row["id"];
	$_SESSION["username"] = $row["username"];
	header('Location: ../index.php');
	
}
else{
	//Handle error
}
?>