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
			
	});
	
	
	appendItemBefore(ingredientsContainer, ingredientQty, btn);
	appendItemBefore(ingredientsContainer, unitType, btn);
	appendItemBefore(ingredientsContainer, ingredientName, btn);
	appendItemBefore(ingredientsContainer, removeBtn, btn);
	appendItemBefore(ingredientsContainer, br, btn);
	
	//Increment the number of ingredients
	ingredientCount++;
	
	
}

//Helper function to remove an item from a div
function removeItem(container, itemToRemove){
	
	container.removeChild(itemToRemove);
	//Decrement here
	ingredientCount--;
}

//Rename me! Helper function that appends an element before another
function appendItemBefore(container, item, oldItem){
	
	container.insertBefore(item,oldItem);
}


