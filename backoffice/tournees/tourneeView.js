document.getElementById('select_beneficiaire').addEventListener('submit', function (e) {
    e.preventDefault();
    const beneficiaire = document.getElementsByClassName('inputBeneficiaire');

    const beneficiaireError = document.getElementById('beneficiaireError');
    let check = true;


    if (beneficiaire == undefined) {
        beneficiaireError.style.display = "block";
        check = false;
    }

    if (check === true) {
        sendRequestTournee('../backoffice/tournee/displayProducts.php','');
        sendRequestTournee('../backoffice/tournee/getLivraison.php', '');

    }

});

function sendRequestTournee(script,values) {
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