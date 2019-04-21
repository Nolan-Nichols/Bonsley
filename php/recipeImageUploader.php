<?php
SESSION_START();
//File sent over from upload function in recipeUploadHelper.js
$theFile = $_FILES['pending_files'];
//Eegh, document root nono!
$path =  $_SERVER["DOCUMENT_ROOT"]. "/cook/img/recipeProfiles/" . $_SESSION["recipeDir"] . "/";

//Should do some error handling here...

echo uploadToDir($theFile, $path);

function uploadToDir($theFile, $path){

//Should randomize the file name to avoid duplicate names

$path = $path.$_FILES["pending_files"]["name"];
	
move_uploaded_file($_FILES["pending_files"]["tmp_name"], $path);

//Handle file limitations and do some security checks you doofus!
return "Success";

}




?>