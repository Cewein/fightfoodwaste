function usersRequests(type, button) {
    //Switch title
    const buttons = document.getElementById('buttonsUsers').childNodes;
    const title = document.getElementById('actualDisplay');
    title.innerHTML = buttons[button].value;

    const container = document.getElementById('tbody');
    container.innerHTML = "";
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
    //Switch title
    const buttons = document.getElementById('buttonsUsers').childNodes;
    const title = document.getElementById('actualDisplay');
    title.innerHTML = buttons[1].value;

    const container = document.getElementById('tbody');
    container.innerHTML = "";
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
    demandeId.innerText = " " + idDemande;
    message.innerText = "";

    const request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState === 4) {
            //Display Products
            container.innerHTML= request.responseText;
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
            container.innerHTML = request.responseText;
            console.log(document.getElementById(idDemande));
            console.log(idDemande);
            hide(document.getElementById(idDemande));
        }
    };
    request.open('POST', '../backoffice/request/changeStatut.php');
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.send(`newStatut=${statut}&idDemande=${idDemande}`);
}

function hide(element) {
    console.log(element);
    element.style.display = 'none';
}
