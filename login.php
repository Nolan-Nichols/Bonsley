<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Cooking With Bonsley</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		 <link rel="stylesheet" href="css/global.css">
		 <link rel="stylesheet" href="css/header.css">
		 <link rel="stylesheet" href="css/navigation.css">
		 <link rel="stylesheet" href="css/login.css">
		
		<link href="https://fonts.googleapis.com/css?family=Sacramento" rel="stylesheet">
		
		<style>
		</style>
	</head>

	<body>
		<?php 
		
			//Get the header and navigation template since we're going to be using these on every page
			include("templates/header.php");
			include("templates/navigation.php");
			
		
		?>
		
		<div id="body-wrapper">
			
			<div id="login-wrapper">
					
				<form action="php/loginValidator.php" method = "POST">
					<h1>--Delicious Noms Await You--</h1>
					<input type="text" name ="email" id = "email" placeholder="Email Address">
					<input type="password" name = "pw" id ="pw" placeholder="Password">
					<input type="submit" value="Log in">
				</form>
				
			</div>
			
		</div>
		

	</body>
	
</html>