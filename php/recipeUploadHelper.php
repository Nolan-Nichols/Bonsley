<?php
include("connect.php");

//stripslashes isn't recursive so we will need to create a funciton that iterates over the arrays and does the dirty work...
//TODO

//AJAX form data

//Recipe data
$name = stripslashes($_POST["name"]);
$description = stripslashes($_POST["description"]);
$prepTime = stripslashes($_POST["prepTime"]);
$cookTime = stripslashes($_POST["cookTime"]);

//Sent JSON data needs to be decoded!

//Dynamic ingredients being added from JS
$ingredientName = json_decode( $_POST["ingredients"]);
$qty = json_decode( $_POST["qty"]);
$unit = json_decode( $_POST["unit"]);

//Dynamic steps being added from JS
$step = json_decode( $_POST["step"] );
//We don't need to get the step number since we can iterate over the recipe step name and assign that step an integer value



//Generate directory path name
$recipeDirName = createUID($name);
//Make it!
createDirectory($recipeDirName);


//Perhaps look into using transactions...

//Insert into recipe
$recipeSQL = "INSERT INTO recipe (id, author_id, name, prep_time, cook_time, description, creation_date) VALUES (11,2, '$name', '$prepTime', '$cookTime', '$description', CURRENT_TIMESTAMP ) ";

mysqli_query($con, $recipeSQL);

//Get last insert id
$recipeID = mysqli_insert_id($con);

//Check for successful insert first....


//Iterate over ingredients to insert into ingredients and our helper table
for($i = 0; $i < count($ingredientName); $i++){
	
	$getName = $ingredientName[$i];
	$getUnit = $unit[$i];
	$getQty = $qty[$i];
	
	$ingredientQuery = "INSERT INTO ingredient (name) VALUES ( '$getName' ) ";
	mysqli_query($con, $ingredientQuery);
	
	//Get ingredient ID  to store into recipe_ingredients table
	$ingredientID = mysqli_insert_id($con);
	
	//Store data in recipe_ingredients helper table 
	$recipeIngredientsQuery = "INSERT INTO recipe_ingredients ( recipe_id, ingredient_id, qty, unit ) VALUES ( '$recipeID' , '$ingredientID' , '$getUnit' , '$getQty')";
	mysqli_query($con, $recipeIngredientsQuery);
	
}

//Insert instructions 
for($i = 0; $i < count($step); $i++){
	
	$instructionStep = $step[$i];
	
	$instructionQuery = "INSERT INTO instructions ( recipe_id, step_number, instruction ) VALUES ( '$recipeID' , '$i', '$instructionStep' )";
	mysqli_query($con, $instructionQuery);

}


//mysqli_commit($con);
mysqli_close($con);

//Callback statement should be something like the directory name for image uploading...
echo $step[0];


//Generate a random file directory name for recipe image storage
//Doesn't have to be fancy
function createUID($myString){
		
	$md5 = md5($myString);
	$uid = uniqid();
	
	return $md5.$uid;

}

//Check to see if that path exists you dumbo
//Should check if that path already exists..
//Create a new directory based on the createUID name passed in above
function createDirectory($dirName){
	
	$currentDir = realpath(dirname(__FILE__));
	$targetDir = $currentDir . '/../img/recipeProfiles/';
	$finalDest = $targetDir.$dirName;
	
	//Change permissions if using a UNIX box...
	mkdir($finalDest, 0777, false);

}


//TODO
//Input validation 

?>