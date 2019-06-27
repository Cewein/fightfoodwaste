function displayMap(idTournee,dateTournee) {

    const form = document.getElementById('listBenef');
    const benef = document.createElement('input');
    benef.type='hidden';
    benef.value=idTournee;
    benef.name="idTournee";
    form.appendChild(benef);

    const date = document.createElement('input');
    date.type='hidden';
    date.value=dateTournee;
    date.name="dateTournee";
    form.appendChild(date);


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

        for (let i = 0; i < beneficiaires.length - 1; i++) {
            let button = document.createElement("button");

            if (beneficiaires !== '') {
                beneficiaire = beneficiaires[i].split(',');

                //Create the button to add the marker
                button.classList.add("btn");
                button.classList.add("btn-outline-primary");
                button.innerHTML = beneficiaire[0];
                button.onclick = function () {
                    AddPoint(beneficiaire[3], beneficiaire[4]);
                    addInput(beneficiaires[i],i);
                    return false;
                };

                containerButtons.appendChild(button);
            }
        }

    })
}

function AddPoint(lat, long) { //Create marker on the map
    var coords = {
        // lng: 2.161420,
        // lat: 48.434416
        lng: long,
        lat: lat
    };

    let frame = window.map;

    frame.newDropoff(coords);
}

function addInput(beneficiaire,i) {
    if(checkExist(i)===false){
        const form = document.getElementById('listBenef');
        const benef = document.createElement('input');
        benef.name=i;
        benef.type='hidden';
        benef.value=beneficiaire;
        form.appendChild(benef);
    }
}

function checkExist(id) {
    const element = document.getElementById(id);
    return element !== null; // if element exist

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

function reload()
{
    window.map.location.reload(true);
}