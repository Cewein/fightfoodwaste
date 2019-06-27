document.getElementById('select_beneficiaires').addEventListener('submit', function (e) {
    e.preventDefault();
    const beneficiaires = document.getElementsByClassName('inputBeneficiaire');
    const dateTournee = document.getElementById('dateTournee');

    const beneficiaireError = document.getElementById('beneficiaireError');
    const dateError = document.getElementById('dateError');

    let check = true;

    let i = 0;
    let j = 0;
    let beneficiairesChecked = [];

    while (typeof beneficiaires[i] !== 'undefined') {
        if (beneficiaires[i].checked === true) {
            benefInfos = document.getElementById(beneficiaires[i].value).childNodes;
            
            beneficiairesChecked[j]=[];
            beneficiairesChecked[j]['id'] = beneficiaires[i].value;
            beneficiairesChecked[j]['name'] = benefInfos[1].innerHTML;
            j++;
        }
        i++;
    }

    if (beneficiairesChecked.length === 0) { // = No beneficiaire checked
        check = false;
        beneficiaireError.style.display = 'block';
    } else {
        beneficiaireError.style.display = 'none';
    }

    if (checkDate(dateTournee.value) === false) {
        dateError.style.display = 'block';
        dateError.style.color = "red";
        check = false;
    } else {
        dateError.style.display = 'none';
    }


    if (check === true) {
        const form = document.getElementById('select_beneficiaires');
        const productsTable = document.getElementById('displayProducts');

        form.style.display = 'none';
        productsTable.style.display = 'block';

        sendRequestTournee('../backoffice/tournees/setIdDeliver.php', ``, function (res) {
            nextBeneficiaire(beneficiairesChecked, -1, dateTournee.value, res);
        });

    }

});

function nextBeneficiaire(BeneficiairesList, actual, dateTournee, idTournee) {
    const nextButton = document.getElementById('validateBenef');

    if (actual >= 0) {
        const allProducts = document.getElementsByClassName('selectButton');
        let productsSelected = [];

        //Get Beneficiaire id
        const idBeneficiaire = BeneficiairesList[actual]['id'];

        //Get checked products
        let i, j = 0;
        for (i = 0; i < allProducts.length; i++) {
            if (allProducts[i].checked === true) {
                productsSelected[j] = allProducts[i].value;
                j++;
            }
        }

        //Enregistrer ces produits cochés
        sendRequestTournee('../backoffice/tournees/deliverCreate.php', `productsSelected=${productsSelected}&idBeneficiaire=${idBeneficiaire}&dateTournee=${dateTournee}&idTournee=${idTournee}`, function (res) {

        })
    }

    displayProducts();
    console.log(BeneficiairesList);
    if (BeneficiairesList.length > actual + 1) {
        const infoBenef = document.getElementById('stepTitle');
        infoBenef.innerText = BeneficiairesList[actual + 1]['name'];
        nextButton.onclick = function () {
            nextBeneficiaire(BeneficiairesList, actual + 1, dateTournee, idTournee);
        };

    } else {
        const displayProducts = document.getElementById('displayProducts');
        const EndGenerate = document.getElementById('EndGenerate');
        const stepTitle = document.getElementById('stepTitle');

        displayProducts.style.display = 'none';
        EndGenerate.style.display = 'block';
        stepTitle.innerText = "Tournées enregistrées !";
    }
}

function displayProducts() {
    const container = document.getElementById('productsTable');
    sendRequestTournee('../backoffice/stock/allStock.php', 'tournee=true', function (response) {
        container.innerHTML = response;
    });
}

function finish() {
    window.location.replace("tourneeHome.php");
}

function checkDate(dateString) {//date send like string
    const date = Date.parse(dateString);
    const dateNow = Date.now();

    return date >= dateNow;
}

function sendRequestTournee(script, values, response = function () {
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