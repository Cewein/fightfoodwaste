function updateBeneficiaire(id) {
    const name = document.getElementById('modifyNom');
    const adress = document.getElementById('modifyAdress');
    const city = document.getElementById('modifyCity');
    const type = document.getElementById('modifyType');
    const latitude = document.getElementById('modifyLat');
    const longitude = document.getElementById('modifyLong');
    const idBenef = document.getElementById('beneficiaireId');

    const benef = document.getElementById(id);

    const benefInfos = benef.childNodes;

    name.value = benefInfos[1].innerHTML;
    adress.value = benefInfos[2].innerHTML;
    city.value = benefInfos[3].innerHTML;
    latitude.value = benefInfos[4].innerHTML;
    longitude.value = benefInfos[5].innerHTML;
    type.value = benefInfos[6].innerHTML;
    idBenef.value = id;
}

function deleteBeneficiaire(id) {
    const request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState === 4) {

        }
    };
    request.open('POST', '../backoffice/beneficiaires/updateBeneficiaire.php');
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.send(`id=${id}&action=delete`);

    hide(document.getElementById(id));
}

document.getElementById('add_beneficiaire').addEventListener('submit', function (e) {
    e.preventDefault();
    const nom = document.getElementById('inputNom');
    const adress = document.getElementById('inputAdress');
    const city = document.getElementById('inputCity');
    const type = document.getElementById('inputType');
    const latitude = document.getElementById('inputLat');
    const longitude = document.getElementById('inputLong');

    const nomError = document.getElementById('nameError');
    const adressError = document.getElementById('adressError');
    const cityError = document.getElementById('cityError');
    const LatError = document.getElementById('LatError');
    const LongError = document.getElementById('LongError');

    let check = true;


    if (nom.value.length < 3) {
        nomError.style.display = "block";
        check = false;
    }

    if (adress.value.length > 0 && adress.value.length <= 100) {

    } else {
        adressError.style.display = "block";
        check = false;
    }

    if (city.value.length > 0 && city.value.length <= 100) {

    } else {
        cityError.style.display = "block";
        check = false;
    }

    if (latitude.value.length > 9 || longitude.value.length > 9) {
        check = false;
        LatError.style.display = 'block';
        LongError.style.display = 'block';
    }

    if (check === true) {
        const request = new XMLHttpRequest();
        request.onreadystatechange = function () {

            if (request.readyState === 4) {
                const form = document.getElementById('add_beneficiaire');
                const container = document.getElementById('modal-body');

                const alert = document.createElement("p");
                alert.innerHTML = request.responseText;
                container.appendChild(alert);

                form.style.display = "none";

            }
        };
        request.open('POST', '../backoffice/beneficiaires/addBeneficiaire.php');
        request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        request.send(`nom=${nom.value}&adress=${adress.value}&city=${city.value}&lat=${latitude.value}&long=${longitude.value}&type=${type.value}`);
    }

});

document.getElementById('modify_beneficiaire').addEventListener('submit', function (e) {
    e.preventDefault();
    const nom = document.getElementById('modifyNom');
    const adress = document.getElementById('modifyAdress');
    const city = document.getElementById('modifyCity');
    const type = document.getElementById('modifyType');
    const latitude = document.getElementById('modifyLat');
    const longitude = document.getElementById('modifyLong');
    const idBenef = document.getElementById('beneficiaireId');

    const nomError = document.getElementById('modifyNameError');
    const adressError = document.getElementById('modifyAdressError');
    const cityError = document.getElementById('modifyCityError');
    const LatError = document.getElementById('modifyLatError');
    const LongError = document.getElementById('modifyLongError');

    let check = true;


    if (nom.value.length < 3) {
        nomError.style.display = "block";
        check = false;
    }

    if (adress.value.length > 0 && adress.value.length <= 100) {

    } else {
        adressError.style.display = "block";
        check = false;
    }

    if (city.value.length > 0 && city.value.length <= 100) {

    } else {
        cityError.style.display = "block";
        check = false;
    }

    if (latitude.value.length > 9 || longitude.value.length > 9) {
        check = false;
        LatError.style.display = 'block';
        LongError.style.display = 'block';
    }

    if (check === true) {
        const request = new XMLHttpRequest();
        request.onreadystatechange = function () {

            if (request.readyState === 4) {
                console.log(request.responseText);
                const form = document.getElementById('add_beneficiaire');
                const container = document.getElementById('modal-body');

                const alert = document.createElement("p");
                alert.innerHTML = request.responseText;
                container.appendChild(alert);

                form.style.display = "none";

            }
        };
        request.open('POST', '../backoffice/beneficiaires/updateBeneficiaire.php');
        request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        request.send(`nom=${nom.value}&adress=${adress.value}&city=${city.value}&lat=${latitude.value}&long=${longitude.value}&type=${type.value}&id=${idBenef.value}&action=update`);
    }

});

function reloadModal() { //Réaffiche le modal propre pour ajouter un nouveau bénéficiaire
    const form = document.getElementById('add_beneficiaire');
    form.style.display = "block";

    const nom = document.getElementById('inputNom');
    const adress = document.getElementById('inputAdress');
    const city = document.getElementById('inputCity');
    const type = document.getElementById('inputType');

    nom.value = "";
    adress.value = "";
    city.value = "";
    type.value = "";

}

function hide(element) {
    element.style.display = 'none';
}