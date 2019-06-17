document.getElementById('connection').addEventListener('submit', function (e) {
    e.preventDefault();

    //Récupération des champs
    const mail = document.getElementById('mail');
    const pwd = document.getElementById('pwd');

    //Récupération des champs d'erreur
    const error = document.getElementById("error");

    let check = true;

    if (mail.value === '') {
        mail.style.borderColor = "red";
        error.style.display = "block";
        check = false;
    } else {
        mail.style.borderColor = "grey";
    }

    if (pwd.value === '') {
        pwd.style.borderColor = "red";
        error.style.display = "block";
        check = false;
    } else {
        pwd.style.borderColor = "grey";
    }

    if (check === true) {
        sendRequestConnection(`mailAdress=${mail.value}&password=${pwd.value}`, 'checkConnection.php');
    }

});


function sendRequestConnection(textRequest, script) {
    const request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState === 4) {
            const error = document.getElementById("error");
            if (request.responseText !== 'Done') {
                error.style.display = "block";
                error.innerText = request.responseText;
            } else {
                error.style.display = "none";
                finishConnection();
            }
        }
    };
    request.open('POST', script);
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.send(textRequest);
}

function finishConnection() {
    document.location.href = "../front/index.php";
}