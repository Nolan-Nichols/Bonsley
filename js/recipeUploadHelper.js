
//NONO GLOBALS
var ingredientCount = 0;
var stepsCount = 0;


//Should really have a row wrapper because it would be easier removing a single element rather than multiple ones in each row...
function addIngredient(){

	//Appending ingredient inputs to this div
	var ingredientsContainer = document.getElementById("ingredients-wrapper");
	var btn = document.getElementById("addIngredientButtonForm");
	
	//Quantity input
	var ingredientQty = document.createElement("input");
	ingredientQty.type="text";
	ingredientQty.name= "qty[]";
	ingredientQty.id = ingredientCount;
	ingredientQty.placeholder = "Qty";
	
	//Unit input
	var unitType = document.createElement("input");
	unitType.type="text";
	unitType.name="unit[]";
	unitType.id= ingredientCount;
	unitType.placeholder = "Unit";
	
	//Ingredient name input
	var ingredientName = document.createElement("input");
	ingredientName.name = "ingredientName[]";
	ingredientName.id= ingredientCount;
	ingredientName.placeholder="Ingredient name";
	
	//Remove ingredient button
	var removeBtn = document.createElement("button");
	removeBtn.type = "button";
	removeBtn.name= "remove";
	removeBtn.innerHTML = "remove";
	removeBtn.id = ingredientCount;
	
	//Adding a break after each row
	var br = document.createElement("br");
	
	removeBtn.addEventListener("click", function(){
		
		removeItem(ingredientsContainer, ingredientQty);
		removeItem(ingredientsContainer, unitType);
		removeItem(ingredientsContainer, ingredientName);
		removeItem(ingredientsContainer, removeBtn);
		removeItem(ingredientsContainer, br);
		ingredientCount--;
			
	});
	
	
	appendItemBefore(ingredientsContainer, ingredientQty, btn);
	appendItemBefore(ingredientsContainer, unitType, btn);
	appendItemBefore(ingredientsContainer, ingredientName, btn);
	appendItemBefore(ingredientsContainer, removeBtn, btn);
	appendItemBefore(ingredientsContainer, br, btn);
	
	ingredientCount++;
	
}

//Similar to addIngredient, but we're only using one input instead of three
function addRecipeStep(){

	var recipeStepContainer = document.getElementById("recipe-steps-wrapper");
	var btn = document.getElementById("addRecipeStepButtonForm");
	
	var recipeStepDescription = document.createElement("input");
	recipeStepDescription.type = "text";
	recipeStepDescription.name = "stepDescription[]";
	recipeStepDescription.id = stepsCount;
	recipeStepDescription.placeholder = "Step";
	
	//Create a function for me!
	var removeBtn = document.createElement("button");
	removeBtn.type = "button";
	removeBtn.name = "removeStep";
	removeBtn.innerHTML = "remove";
	removeBtn.id = stepsCount;
	
	
	var br =  document.createElement("br");
	
	removeBtn.addEventListener("click", function(){
		
		removeItem(recipeStepContainer, recipeStepDescription);
		removeItem(recipeStepContainer, removeBtn);
		removeItem(recipeStepContainer, br);
		stepsCount--;
		
	});
	
	appendItemBefore(recipeStepContainer, recipeStepDescription, btn );
	appendItemBefore(recipeStepContainer, removeBtn, btn );
	appendItemBefore(recipeStepContainer, br, btn );
	
	stepsCount++;

}

//Helper function to remove an item
function removeItem(container, itemToRemove){
	
	container.removeChild(itemToRemove);
	//Decrement here
	
}

//Rename me! Helper function that appends an element before another
function appendItemBefore(container, item, oldItem){
	
	container.insertBefore(item,oldItem);
	
}

//Call from onchange when user selects multiple files
//Should really implement a feature that waits until one image is loaded before loading the next one...
//Load is heavy doing it using the following function...............:(
function loadFiles(){
	
	//Since we're not using a form to retrieve images, we can get files by doing the following
	var files = document.getElementById("foodInputFiles").files;
	
	//Iterate
	for(var i = 0; i < files.length; i++){
		
		//Passing file data 
		displayImageThumbs(files[i]);
		console.log(files[i].name);
	
	}

}

//Displays images to viewport before uploading
function displayImageThumbs(fileObj, fileReader){
	
	//Because the loading  icon should get loaded first, we should leave most of the vars outside of the loading event
	
	var container = document.getElementById("recipe-image-wrapper");
	var fileReader = new FileReader();
	var loadingIcon = document.create
	var thumbnail = document.createElement("div");
	thumbnail.className = "imagePreviewBox";
	
	thumbnail.innerHTML = "<img src='img/icons/loader.gif' width='150'/>";
	
	container.insertBefore(thumbnail, null);
	//Load files/images
	fileReader.addEventListener("load", function(){
		
		
		//Add loading bar or icon
		
		//var picFile = event.target;
		
		thumbnail.innerHTML = "<img src='" + this.result + "' width='150'/>";
		
		
		
		
	});
	
	if(fileObj){
		
		fileReader.readAsDataURL(fileObj);
		
	}
	
}








