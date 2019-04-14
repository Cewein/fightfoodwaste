//fonction qui créé une requête sur tous les naviateurs
function newXmlHttpRequest() {
    if (window.XMLHttpRequest) {
        return new XMLHttpRequest();
        return new ActiveXObject("Microsoft.XMLHTTP"); // pour tous les navigateurs sauf IE6 et les versions antérieures
    }
}

function Alert(input, error) { // Fonction d'encadrement d'un champ
    if (error == 1) {
        input.style.borderColor = "red"; // Encadrement d'un champ en rouge
    } 
}

function showAlert(input, error, message) { // Fonction d'affichage d'un message d'erreur
    if (error == 1) {
        input.innerHTML = "<div class='alert alert-danger' role='alert' >" + message + "</div>";       // Alerte d'erreur
    } 

}

function checkEmail() { //Fonction de vérification de l'Email

    var regex = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
    var inputEmail = document.getElementById('email');
    var inputAlert = document.getElementById('emailAlert');

    if (!inputEmail.value.match(regex)) {
        Alert(inputEmail, 1); // On encadre le champ en rouge
        showAlert(inputAlert, 1, "Veuillez saisir une adresse email valide !");// On affiche un message d'erreur
        return false;
    }
}



function checkConnection() {
    var mail = document.getElementById('mail').value;
    var password = document.getElementById('pwd').value;

    var connect = mail + password;

    var request = newXmlHttpRequest();
    request.onreadstatechange = function () {
        if (request.readyState === 4 && request.status === 200)
        {
            alert(request.responseText);
        }
    };
    request.open("POST", 'checConnection.php');
    request.send(`mail=${mail}&password=${password}`);

}
