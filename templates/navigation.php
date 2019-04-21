<div class="topnav">
			
			<a href="index.php">Home</a>			
			<a href="recipe.php">Recipies</a>
			<a href="create.php">Create</a>
			<a href="#">Register</a>
			
			<?php 
			if(isset($_SESSION["username"])){
				echo "<a href='php/logout.php'>Logout</a>";
				echo "<a href= 'profile.php?id=".$_SESSION["uid"]."' >". $_SESSION["username"] ."'s profile </a>";
			}
			else{
				echo "<a href='login.php'>Login</a>";
			}
			
			
			
			?>
		</div>