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
    } else {
        const form = document.getElementById('select_beneficiaires');
        const productsTable = document.getElementById('displayProducts');
        form.style.display = 'none';
        productsTable.style.display = 'block';

        generateTournee(beneficiairesChecked);
    }


    if (check === true) {
        //sendRequestTournee('../backoffice/tournee/displayProducts.php', '');
        sendRequestTournee('../backoffice/tournee/getLivraison.php', '');

    }

});

function generateTournee(beneficiaireList) {
    const container = document.getElementById('productsTable');
    for (i = 0; i < beneficiaireList.length; i++) {
        console.log(beneficiaireList[i]);
        products = sendRequestTournee('../backoffice/stock/allStock.php', 'tournee=true');
        console.log(sendRequestTournee('../backoffice/stock/allStock.php', 'tournee=true'));
        container.innerHTML = products;
    }
}

function sendRequestTournee(script, values) {
    const request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState === 4) {
            return request.responseText;
        }
    };
    request.open('POST', script);
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.send(values);
}