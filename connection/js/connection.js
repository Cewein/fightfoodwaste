
 


 //fonction qui créé une requête sur tous les naviateurs 
function newXmlHttpRequest() {
	if(window.XMLHttpRequest) {
   	 	return new XMLHttpRequest();
   	return new ActiveXObject("Microsoft.XMLHTTP"); // pour tous les navigateurs sauf IE6 et les versions antérieures
   	}
}
    


function checkConnection(){
	var mail = Document.getElementById('mail').value; 
	var password = Document.getElementById('pwd').value;

	var connect=mail+password; 

	var request = newXmlHttpRequest(); 
	request.onreadstatechange = fonction() {
		if(request.readyState == 4 && request.status == 200); {
				alert(request.responseText);
	}

}

request.open("POST", ??); 
request.send(responseText); 

}
