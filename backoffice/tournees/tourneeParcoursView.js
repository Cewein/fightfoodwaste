function displayMap(idTournee) {
    const map = document.getElementById('map');
    const tourneelist = document.getElementById('displayTournees');
    const infosTournee = document.getElementById('infosTournee');

    map.style.display = 'block';
    tourneelist.style.display = 'none';
    infosTournee.innerHTML = 'Tournée numéro ' + idTournee;

    //récupérer les points de livraison
    sendRequestParcoursTournee('../backoffice/tournees/GetAdressesLivraison.php', `idTournee=${idTournee}`, function (res) {
        console.log(res);

        //String to array
        beneficiaires = res.split(';');

        for (i = 0; i < beneficiaires.length-1; i++) {
            $beneficiaire=beneficiaires[i].split(',');

        }

        //transformer les adresses de livraison en points lat long

        //afficher des boutons avec ces points
    })

}

function sendRequestParcoursTournee(script, values, response = function () {
}) {
    const request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState === 4) {
            response(request.responseText);
        }
    };
    request.open('POST', script);
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.send(values);
}