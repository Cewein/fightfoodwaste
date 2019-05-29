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

    console.log(beneficiairesChecked);

    if (j === 0) { // = No beneficiaire checked
        check = false;
        //Afficher les vérifications & messages d'erreur
    } else {
        const form = document.getElementById('select_beneficiaires');
        const productsTable = document.getElementById('displayProducts');

        form.style.display = 'none';
        productsTable.style.display = 'block';

        nextBeneficiaire(beneficiairesChecked, 0);

    }


});

function nextBeneficiaire(BeneficiairesList, actual) {
    const nextButton = document.getElementById('validateBenef');
    console.log(actual);
    if (actual > 0) {
        //Récupérer les produits cochés
        //Enregistrer ces produits cochés
        //Editer le PDF (PHP ^)
    }

    //Display products
    displayProducts();

    if (BeneficiairesList.length > actual) {
        nextButton.onclick = "nextBeneficiaire(" + BeneficiairesList + "," + (actual + 1) + ")";
    }
}

function displayProducts() {
    const container = document.getElementById('productsTable');
    let products;
    products = sendRequestTournee('../backoffice/stock/allStock.php', 'tournee=true');
    console.log(products);
    container.innerHTML = products;
}

function sendRequestTournee(script, values) {
    const request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState === 4) {
            console.log(request.responseText);
            return request.responseText;
        }
    };
    request.open('POST', script);
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.send(values);
}