document.getElementById('select_beneficiaires').addEventListener('submit', function (e) {
    e.preventDefault();
    const beneficiaires = document.getElementsByClassName('inputBeneficiaire');

    const beneficiaireError = document.getElementById('beneficiaireError');

    let check = true;

    let i = 0;
    let j = 0;
    const beneficiairesChecked = [];

    while (typeof beneficiaires[i] !== 'undefined') {
        if (beneficiaires[i].checked === true) {
            beneficiairesChecked[j] = beneficiaires[i].value;
            j++;
        }
        i++;
    }

    if (j === 0) { // = No beneficiaire checked
        check = false;
        //Afficher les vérifications & messages d'erreur
    } else {
        const form = document.getElementById('select_beneficiaires');
        const productsTable = document.getElementById('displayProducts');

        form.style.display = 'none';
        productsTable.style.display = 'block';

        sendRequestTournee('../backoffice/tournees/setIdDeliver.php', ``, function (res) {
            console.log(res);
            nextBeneficiaire(beneficiairesChecked, -1, res);
        });


    }

});

function nextBeneficiaire(BeneficiairesList, actual, idTournee) {
    const nextButton = document.getElementById('validateBenef');

    if (actual >= 0) {
        const allProducts = document.getElementsByClassName('selectButton');
        let productsSelected = [];

        //Get Beneficiaire id
        const idBeneficiaire = BeneficiairesList[actual];

        //Get checked products
        j = 0;
        for (i = 0; i < allProducts.length; i++) {
            if (allProducts[i].checked === true) {
                productsSelected[j] = allProducts[i].value;
                j++;
            }
        }
        console.log(idTournee);

        //Enregistrer ces produits cochés
        sendRequestTournee('../backoffice/tournees/deliverCreate.php', `productsSelected=${productsSelected}&idBeneficiaire=${idBeneficiaire}&idTournee=${idTournee}`, function (res) {

        })
        //Editer le PDF (PHP ^)
    }

    //Display products
    displayProducts();

    if (BeneficiairesList.length > actual + 1) {
        nextButton.onclick = function () {
            nextBeneficiaire(BeneficiairesList, actual + 1, idTournee);
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