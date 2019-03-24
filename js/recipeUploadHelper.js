
var numIngredients = 0;

//We should really append divs with input elements inside. This would allow for less code
//And one would simply have to remove a row rather than each element within a row


//Append new form inputs to the ingredient div
//Assign each element name to numIngredients for quick removal
function addIngredient(){
	
	var div = document.getElementById("ingredients-wrapper");
	var btn = document.getElementById("addIngredientButtonForm");
	
	//Ingredients Quantity stuff
	var qtyInput = document.createElement("input");
	qtyInput.placeholder = "Qty";
	qtyInput.id = "qty";
	qtyInput.name = numIngredients;
	
	
	//Ingredients units of measurement stuff
	var unitInput = document.createElement("input");
	unitInput.placeholder = "Units";
	unitInput.id = "unit";
	unitInput.name = numIngredients;
	//Ingredient name
	var ingredientName = document.createElement("input");
	ingredientName.placeholder = "Ingredient Name";
	ingredientName.id = "ingredientName";
	ingredientName.name = numIngredients;
	
	//Link to remove the ingredient row
	var removeRowBtn = document.createElement("a");
	removeRowBtn.href = "#";
	removeRowBtn.innerHTML = numIngredients;
	removeRowBtn.id = numIngredients;
	removeRowBtn.name = numIngredients;
	
	//Break
	var br = document.createElement("br");
	br.id = numIngredients;
	br.name = numIngredients;
	
	//Insert before the add ingredient button for easier UI 
	div.insertBefore(qtyInput, btn);
	div.insertBefore(unitInput, btn);
	div.insertBefore(ingredientName, btn);
	div.insertBefore(removeRowBtn, btn);
	div.insertBefore(br, btn);
	
	
	//Add event listener to the remove button 
	removeRowBtn.addEventListener("click", removeIngredient);
	
	console.log(numIngredients);
	numIngredients++;
	
	
	

}

//Removes the ingredient row elements
function removeIngredient(){
	/*
	var parentNode = document.getElementById("ingredients-wrapper");
	var source = event.srcElement.name;
	
	var qty = document.getElementById("qty");
	var unit = document.getElementById("unit");
	var name = document.getElementById("ingredientName");
	var btn = document.getElementById(source);
	var br = document.getElementById(source);
	
	qty.parentNode.removeChild(qty);
	unit.parentNode.removeChild(unit);
	name.parentNode.removeChild(name);
	btn.parentNode.removeChild(btn);
	br.parentNode.removeChild(br);
	numIngredients--;
	//removeRowBtn.parentNode.removeChild(removeRowBtn);
	//br.parentNode.removeChild(br);
	*/
}

