<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Cooking With Bonsley</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		 <link rel="stylesheet" href="css/global.css">
		 <link rel="stylesheet" href="css/header.css">
		 <link rel="stylesheet" href="css/navigation.css">
		 <link rel="stylesheet" href="css/homepage.css">
		
		
		<style>
		</style>
	</head>

	<body>
		<?php 
		
			//Get the header and navigation template since we're going to be using these on every page
			include("templates/header.php");
			include("templates/navigation.php");
			
			//Get PHP scripts used to query our homepage
			include("php/HTMLrecipeQueryHelper.php");
		?>
		
		<div id="body-wrapper">
			<div id="content-wrapper">
				<div class="content-column left">
					
					<?php 
			
						//test();
						getRecipePreview(); 
			
					?>
				
				</div>
		
		
				<div class="content-column right">
					
					<div class="ad">
					</div>
				
				</div>
			
			</div>
		
		</div>
		

	</body>
	
</html>