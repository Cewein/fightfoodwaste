function updateBeneficiaire(id) {

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

    if (adress.value > 0 && adress.value <= 100) {

    } else {
        adressError.style.display = "block";
        check = false;
    }

    if (city.value > 0 && city.value <= 100) {

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
        request.open('POST', '../backoffice/stock/addBeneficiaire.php');
        request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        request.send(`nom=${nom.value}&adress=${adress.value}&city=${city.value}&type=${type.value}`);
    }

});