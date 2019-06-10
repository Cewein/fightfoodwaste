function loadPDF(idLivraison, beneficiaire, dateLivraison) {

    sendRequestPDF('tournee/createPDF.php',`beneficiaire=${beneficiaire}&dateLivraison=${dateLivraison}`, )
}


function sendRequestPDF(script, values, response = function () {
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