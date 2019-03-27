//Gets files from user input and makes a function call to uploadFiles()
//This function is called from the select images button
function loadFiles(){
	
	//console.log("Name\t\tType\t\tSize");
	//Grab contents from user input as file data
	var rawFileInput = document.getElementById("form-input").files;
	
	//Loop over files
	for(var i = 0; i < rawFileInput.length; i++){
		
		//displayFilesToScreen(rawFileInput[i]);
		displayThumbnails(rawFileInput[i]);
		
		//Rather than passing a list/array of data, pass one obj at a time
		uploadFiles(rawFileInput[i]);
		console.log(rawFileInput[i].name + "\t\t" + rawFileInput[i].type + "\t\t" + rawFileInput[i].size );
	
	}
	
}

//Creates the ajax call to send off the form data to PHP
function uploadFiles(fileObj){
	
	//Use formData to send off
	var formData = new FormData();
	
	//Could make an $.ajax call but this works too
	var xml = new XMLHttpRequest();
	
	//Rename me please, and don't forget about the php renaming too
	formData.append("pending_files", fileObj);
	xml.open("POST", "php/test.php");
	
	xml.onreadystatechange = function(){
	
		if(xml.readyState == 4 && xml.status == 200){
		
			//console.log(xml.responseText);
		
		}
	
	};
	
	xml.send(formData);

}

function displayThumbnails(imgSrc){
			
	//Container or wrapper to display images
	var thumbnailContainer = document.getElementById("content");
	
	var thumbnail = document.createElement("div");
	thumbnail.className = "thumbnail";
	
	//thumbnail.innerHTML = 
	
	//innerDiv.appendChild(img);
	//outerDiv.appendChild(innerDiv);
	
	var picReader = new FileReader();
	
	picReader.addEventListener("load", function(){
		
		var picFile = event.target;
		var thumbnail = document.createElement("div");
		thumbnail.className = "thumbnail";
		thumbnail.innerHTML = "<a class='thumbnail' href='#thumb'><img src='" + picFile.result + "' width='150'/><span><img src='" + picFile.result + "' /> Image Name:" + imgSrc.name +"</span></a>";
		thumbnailContainer.insertBefore(thumbnail, null);
		
	
	});
	
	if(imgSrc){
	
		picReader.readAsDataURL(imgSrc);
	
	}
	
}