//Change the border color depending on the state of the input
//Accept element and a string color
function changeBorderColor (element, color){
	
	element.style.border = "1px solid " + color;
}

//Adjust regEx as needed
function isValidString(string){
	
	var pattern = new RegExp("^[a-zA-Z][a-zA-Z0-9 \-']+$");
	var result= pattern.test(string);
	
	//Yay
	if(result){
		
		return true;
		
	}
	//Icky characters found
	else{
		
		return false;
		
	}

}

function validateName(){
	
	var name = document.getElementById("recipeNameForm");
	
	//If improper characters
	if(isValidString(name.value) === false ){
		
		changeBorderColor(name, "red");
		
	}
	//If length is too short or too long. Change me so we can alert user
	else if(name.value.length < 1 || name.value.length > 100 ){
		
		changeBorderColor(name, "red");
		
	}
	else if(name.value == ""){
		
		changeBorderColor(name, "red");
		
	}
	else{
		
		changeBorderColor(name, "green");
		
	}
	
}

function validateDescription(){
	
	var desc = document.getElementById("recipeDescriptionForm");
	
	//For now, just check for length requirements and then implement some regex for sanitation purposes
	
	if(desc.value.length < 2){
		
		changeBorderColor(desc, "red");
		
	}
	else{
		
		changeBorderColor(desc, "green");
		
	}
	
}

//Expects an integer value
function validatePrepTime(){
	
	var prepTime = document.getElementById("recipePrepTimeForm");
	
	if(prepTime.value == ""){
	
		changeBorderColor(prepTime, "red");
	
	}

	else if(isNaN(prepTime.value)){
		
		changeBorderColor(prepTime, "red");
	}
	else{
		changeBorderColor(prepTime, "green");
	}
	
}

//Expects an integer value
function validateCookTime(){
	
	var cookTime = document.getElementById("recipeCookTimeForm");
	
	if(cookTime.value == ""){
	
		changeBorderColor(cookTime, "red");
	
	}

	else if(isNaN(cookTime.value)){
		
		changeBorderColor(cookTime, "red");
	}
	else{
		
		changeBorderColor(cookTime, "green");
		
	}
	
}

//This function needs so much help...
function submitFormData(){
	
	//Non array vars
	var name = document.getElementById("recipeNameForm").value;
	var description = document.getElementById("recipeDescriptionForm").value;
	var prepTime = document.getElementById("recipePrepTimeForm").value;
	var cookTime = document.getElementById("recipeCookTimeForm").value;
	
	//Array vars for ingredient data
	var ingredients = document.getElementsByName("ingredientName[]");
	var qty = document.getElementsByName("qty[]");
	var unit = document.getElementsByName("unit[]");
	
	//Get the total number of ingredients
	var length = ingredients.length;
	
	//New arrays since ajax doesn't like html -> js
	//Should just use JSON rather than create all of these arrays...
	var ingName = [length];
	var ingQty = [length];
	var ingUnit = [length];
	
	//Copy data from old arrays into JS arrays
	for(var i = 0; i < length; i++){
		
		ingName[i] = ingredients[i].value;
		ingQty[i] = qty[i].value;
		ingUnit[i] = unit[i].value;
		
	}
	
	//Off to the races....
	$.ajax({
		
		type: "POST",
		url: "php/recipeUploadHelper.php",
		data: {
			
			name: name,
			description: description,
			prepTime: prepTime,
			cookTime: cookTime,
			ingredients: JSON.stringify(ingName),
			qty: JSON.stringify(ingQty),
			unit: JSON.stringify(ingUnit)
				
		},
		
		success: function(callback){
			
			console.log(callback);
			//Retrieve recipe file directory location for image storage
		
		}
		
	});

}

