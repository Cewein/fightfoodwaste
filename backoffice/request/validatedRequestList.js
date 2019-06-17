function printInformation() {
    var container = document.getElementsById('validatedRequest'); 
     
    getRequestsByStatut("checkedTrue"); 

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState === 4) {
            //Display Products
            container.innerHTML = request.responseText;
        }
    };
    request.open('POST', '../request/displayUsers.php');
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.send(`demande=${idDemande}`);

    console.log("ok js");
}
