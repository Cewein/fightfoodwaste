function usersRequests(type) {
    const container = document.getElementById('tbody');
    container.innerText = "";
    const request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState === 4) {
            container.innerHTML = request.responseText;//Réponse à afficher
        }
    };
    request.open('POST', '../backoffice/request/requestsStatut.php');
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.send(`type=${type}`);
}

function allUsersRequests() {
    const container = document.getElementById('tbody');
    container.innerText = "";
    const textRequest = true;
    const request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState === 4) {
            container.innerHTML = request.responseText;//Réponse à afficher
        }
    };
    request.open('POST', '../backoffice/request/allRequests.php');
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.send(textRequest);
}

function displayProducts(idDemande) {
    const container = document.getElementById("productBody");
    const validate = document.getElementById("buttonValidate");
    const refuse = document.getElementById("buttonRefuse");
    const demandeId = document.getElementById("demandeId");
    const message = document.getElementById("modal-body");

    container.innerText = "";
    validate.onclick = function () {
        changeStatutRequest("checkedTrue", idDemande);
        return false;
    };
    refuse.onclick = function () {
        changeStatutRequest("checkedFalse", idDemande);
        return false;
    };
    demandeId.innerHTML = " " + idDemande;
    message.innerHTML ="";

    const request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState === 4) {
            //Display Products
            container.innerHTML = request.responseText;
        }
    };
    request.open('POST', '../backoffice/request/displayProducts.php');
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.send(`demande=${idDemande}`);
}

function changeStatutRequest(statut, idDemande) {
    container = document.getElementById("modal-body");
    const request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState === 4) {
            container.innerText= request.responseText;
        }
    };
    request.open('POST', '../backoffice/request/changeStatut.php');
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.send(`newStatut=${statut}&idDemande=${idDemande}`);
}
