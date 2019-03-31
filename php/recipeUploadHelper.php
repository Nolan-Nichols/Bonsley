<?php
include("connect.php");

//stripslashes isn't recursive so we will need to create a funciton that iterates over the arrays and does the dirty work...
//TODO

//AJAX form data
$name = stripslashes($_POST["name"]);
$description = stripslashes($_POST["description"]);
$prepTime = stripslashes($_POST["prepTime"]);
$cookTime = stripslashes($_POST["cookTime"]);
$ingredientName = json_decode( $_POST["ingredients"]);
$qty = json_decode( $_POST["qty"]);
$unit = json_decode( $_POST["unit"]);

//Generate directory path
$recipeDirName = createUID($name);

//Make it!
createDirectory($recipeDirName);

//Multi query so we have to use autocommit to ensure that all of the data will be present in the DB
mysqli_autocommit($con, FALSE);
$recipeSQL = "INSERT INTO recipe (id, author_id, name, prep_time, cook_time, description, creation_date) VALUES (5,2, '$name', '$prepTime', '$cookTime', '$description', CURRENT_TIMESTAMP ) ";

mysqli_query($con, $recipeSQL);
mysqli_commit($con);
mysqli_close($con);

//Callback statement should be something like the directory name for image uploading...
echo "done";


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