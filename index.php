<!DOCTYPE html>
<html lang="en">
<head>
<title>CSS Website Layout</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

body {
  margin: 0;
  background-color:	#white;
}


.header {
  background-color: #white;
  padding: 20px;
  text-align: center;
}


.topnav {
  overflow: hidden;
  background-color: black;
  text-align:center;
}


.topnav a {
  
  display: inline-block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  
}


.topnav a:hover {
  background-color: white;
  color: black;
}

#body-wrapper{
	width:100%;
	height:auto;

	

}

#content-wrapper{
	width:1366px;
	min-height:768px;
	height:inherit;
	
	margin-left:auto;
	margin-right:auto;
	
	
}

.content-column{
	float:left;
	padding:10px;
	
}

.content-column.left{
	width:1000px;
	min-height:100px;
	border:1px solid black;

}

.content-column.right{
	width:356px;
	min-height:100px;
	border:1px solid black;
	margin-left:10px;
	
}

.post-container{
	width:100%;
	min-height:100px;
	heioght:auto;
	background-color:#F1F1F1;
	padding:10px;
	border-radius:5px;
	margin-bottom:10px;
}

.post-container span{
	width:100%;
	height:auto
	background-color:;
	display:block;
	font-size:12px;
}

.post-container label{
	width:100%;
	auto;
	background-color:;
	display:block;
	font-size:24px;
	font-weight:700;
	
}

.ad{
	width:100%;
	height:300px;
	background-color:red;
}
















</style>
</head>
<body>
<?php

	include("php/HTMLrecipeQueryHelper.php");
	
?>
<div class="header">
  <h1>Cooking with Bonsley</h1>

</div>

<div class="topnav">
  <a href="#">Home</a>
  <a href="#">Recipies</a>
  <a href="#">Create</a>
  <a href="#">Register</a>
  <a href="#">Login</a>
</div>

<div id="body-wrapper">
	<div id="content-wrapper">
		<div class="content-column left">
			
			
			<?php 
			
			test();
			//getRecipePreview(); 
			
			
			?>
			
			
			
		
		</div>
		
		
		<div class="content-column right">
			<div class="ad"></div>
		</div>
	</div>
</div>

  
</body>
</html>
