<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Cooking With Bonsley</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<link rel="stylesheet" href="css/global.css">
		<link rel="stylesheet" href="css/header.css">
		<link rel="stylesheet" href="css/navigation.css">
		<link rel="stylesheet" href="css/recipeCreation.css">
		
		
		<link href="https://fonts.googleapis.com/css?family=Sacramento" rel="stylesheet">
		
		<script src="js/recipeUploadHelper.js"></script>
		
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
		
			<div id="content-wrapper">
				<div id="recipe-creation-form-wrapper">
					
					<h1>Create a recipe and share it with the world!</h1>
					
					<!--Incoming Javascript!-->
					<form action="" method= "POST" name= "recipeGenerationForm" id= "recipeGenerationForm">
						
						<input type= "text" name= "recipeNameForm" id= "recipeNameForm" placeholder= "Recipe Name">
						<textarea name= "recipeDescriptionForm" id= "recipeDescriptionForm" placeholder="Description"></textarea>
						<input type= "text" name= "recipePrepTimeForm" id= "recipePrepTimeForm" placeholder= "Prep Time">
						<input type= "text" name= "recipeCookTimeForm" id= "recipeCookTimeForm" placeholder= "Cook Time">
						
						<h1>Ingredients</h1>
						
						<!-- This will grow! -->
						<div id= "ingredients-wrapper">
						
							<button type= "button" name= "addIngredientButtonForm" id= "addIngredientButtonForm" onclick="addIngredient()" >Add Ingredient</button>
							
						</div>
						
						<!-- This will grow too! -->
						<div id="recipe-steps-wrapper">
							
							<button type= "button" name= "addRecipeStepButtonForm" id= "addRecipeStepButtonForm">Add Recipe Step</button>
							
						</div>
						
						<input type= "submit" value= "Upload" name= "uploadRecipeButtonForm" id= "uploadRecipeButtonForm">
						
						
						
					</form>
					
				</div>
			</div>
			
		</div>