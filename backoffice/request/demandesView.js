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

function  displayProducts(idDemande) {
    const title = document.getElementById("title");
    title.innerText= "Demande n°"+idDemande;
    const container = document.getElementById("productBody");
    container.innerText = "";
    const request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState === 4) {
            container.innerHTML = request.responseText;//Réponse à afficher
        }
    };
    request.open('POST', '../backoffice/request/displayProducts.php');
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.send(`demande=${idDemande}`);
}
