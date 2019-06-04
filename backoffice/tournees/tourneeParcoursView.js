function displayMap(idTournee) {
    const map = document.getElementById('map');
    const tourneelist = document.getElementById('displayTournees');
    const infosTournee = document.getElementById('infosTournee');

    map.style.display = 'block';
    tourneelist.style.display = 'none';
    infosTournee.innerHTML = 'Tournée numéro ' + idTournee;

    //récupérer les points de livraison
    sendRequestParcoursTournee('../backoffice/tournees/GetAdressesLivraison.php', `idTournee=${idTournee}`, function (res) {
        const containerButtons = document.getElementById('containerButtons');

        //String to array
        beneficiaires = res.split(';');

        for (i = 0; i < beneficiaires.length - 1; i++) {
            let button = document.createElement("button");

            if (beneficiaires !== '') {
                beneficiaire = beneficiaires[i].split(',');

                //Create the button to add the marker
                button.class = 'btn btn-outline-primary';
                button.innerHTML = beneficiaire[0];
                button.onclick = function () {
                    testAddPoint(beneficiaire[3], beneficiaire[4]);
                    return false;
                };

                containerButtons.appendChild(button);
            }

        }

    })

}

function testAddPoint(lat, long) { //Create marker on the map
    var coords = {
        // lng: 2.161420,
        // lat: 48.434416
        lng: long,
        lat: lat
    };

    let frame = window.map;

    frame.newDropoff(coords);
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