<?php
	
	include("connect.php");
	
	
	function getRecipePreview(){
		global $con;
		
		$sql = "SELECT * FROM recipe INNER JOIN users ON recipe.author_id = users.id ";
		if($result = mysqli_query($con, $sql)){
				
			
			while($row = mysqli_fetch_array($result)){
				
				echo "<div class='post-container'>";
					
					echo "<span> Created by: ". $row["username"]. "[". $row["first_name"] ."]</span>";
					echo "<label>". $row["name"] . "</label>";
					echo "<span>Created on: ". $row["creation_date"] ."</span>";
					echo "<span><a href='recipe?recipeid=$row[0]'>Recipe ID: ". $row[0] ." Click me for full Recipe Information!</a></span>";
				echo "</div>";
				
			}
		
		
		}
	
	}
	
	
	function test(){
		
		global $con;
		//$sql = "SELECT * from recipe INNER JOIN recipe_ingredients ON recipe.id = recipe_ingredients.recipe_id INNER JOIN ingredient ON recipe_ingredients.ingredient_id = ingredient.id;";
		$sql ="SELECT DISTINCT r.name AS recipeName, r.id AS recipeID, r.author_id AS authorID, i.name AS ingredientName from recipe r INNER JOIN recipe_ingredients ri ON r.id = ri.recipe_id INNER JOIN ingredient i ON ri.ingredient_id = i.id;";

		if($result = mysqli_query($con, $sql)){
				
			
			while($row = mysqli_fetch_array($result)){
				echo "<div class='post-container'>";
				echo "Recipe ID: " . $row["recipeID"] . "<br>";
				echo "Recipe Name: " . $row["recipeName"] . "<br>";
				echo "Author ID: " . $row["authorID"] . "<br>";
				echo "Ingredients: " . $row["ingredientName"] . "<br>";
				echo "</div>";
				
				
			}
			
		}
	
	}
	

?>