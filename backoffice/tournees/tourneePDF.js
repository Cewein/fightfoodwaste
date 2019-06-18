function loadPDF(idLivraison, beneficiaire, dateLivraison) {
    sendRequestPDF('../backoffice/tournees/createPDF.php',`beneficiaire=${beneficiaire}&dateLivraison=${dateLivraison}`, function (res) {
        console.log(res);
    } )
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