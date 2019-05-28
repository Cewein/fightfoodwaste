function updateBeneficiaire(id) {

}

function deleteBeneficiaire(id){
    const request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        console.log(request.readyState);
        if (request.readyState === 4) {
            console.log(request.responseText);
        }
    };
    request.open('POST', '../backoffice/beneficiaires/updateBeneficiaire.php');
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.send(`id=${id}&action=delete`);

    hide(document.getElementById(id));
}

document.getElementById('add_beneficiaire').addEventListener('submit', function (e) {
    e.preventDefault();
    const nom  = document.getElementById('inputNom');
    const adress = document.getElementById('inputAdress');
    const city = document.getElementById('inputCity');
    const type = document.getElementById('inputType');

    const nomError = document.getElementById('nomError');
    const adressError = document.getElementById('adressError');
    const cityError = document.getElementById('cityError');

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
        request.send(`nom=${nom.value}&adress=${adress.value}&city=${city.value}&type=${type.value}`);
    }

});

function reloadModal() { //Réaffiche le modal propre pour ajouter un nouveau produit
    const form = document.getElementById('add_beneficiaire');
    form.style.display = "block";

    const nom  = document.getElementById('inputNom');
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