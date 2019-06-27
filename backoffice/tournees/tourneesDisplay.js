function modal(idLivraison) {
    const title = document.getElementById('livraisonId');
    title.innerText = idLivraison;

}

function cancelLivraison() {
    const id = document.getElementById('livraisonId').innerText;
    console.log(id);
    const request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState === 4) {
            console.log(request.responseText);
        }
    };
    request.open('POST', '../backoffice/tournees/deleteLivraisonFromTournee.php');
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.send(`idLivraison=${id}`);

}

function displayLivraisons(id) {
    const title = document.getElementById('tourneeId');
    title.innerText = id;

    const request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState === 4) {
            const container = document.getElementById('livraisonBody');
            container.innerHTML = request.responseText;
        }
    };
    request.open('POST', '../backoffice/tournees/displayLivraisonFromTournee.php');
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.send(`idTournee=${id}`);

}

function setEtatLivraison(idlivraison, etatToSet) {
    const request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState === 4) {


        }
    };
    request.open('POST', '../backoffice/tournees/setEtatLivraison.php');
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.send(`idLivraison=${idlivraison}&etat=${etatToSet}`);

}

function deleteTournee(idTournee) {
    const request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState === 4) {

            console.log(request.responseText);
        }
    };
    request.open('POST', '../backoffice/tournees/deleteLivraisonFromTournee.php');
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.send(`idTournee=${idTournee}`);
}

function hide(element) {
    element.style.display = 'none';
}