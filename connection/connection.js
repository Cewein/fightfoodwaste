//fonction qui créé une requête sur tous les naviateurs
/*function newXmlHttpRequest() {
    if (window.XMLHttpRequest) {
        return new XMLHttpRequest();
        return new ActiveXObject("Microsoft.XMLHTTP"); // pour tous les navigateurs sauf IE6 et les versions antérieures
    }
} */



document.getElementById('connection').addEventListener('submit', function (e) {
    e.preventDefault();

    //Récupération des champs
    const mail = document.getElementById('mail');
    const pwd = document.getElementById('pwd');
    

    //Récupération des champs d'erreur
   
    const mailError = document.getElementById("mailError");
    const pwdError = document.getElementById("pwdError");
    

    //Déclaration des variables
    let mail_checked;
    let pwd_checked;

    let check = true;

    //Vérifications du contenu des inputs

    if (mail.value.length < 2 || mail.value.length > 80) {
        check = unvalid_info(mail, mailError);
    } 

    if (checkPassword(pwd, pwdError) === true) { //Check password
        pwd_checked = pwd.value;
    } else {
        check = false;
    }

    if (check === true) {
        sendRequest(`mail=${mail_checked}&pwd=${pwd_checked}`, 'checkConnection.php');
    }

});


function sendRequest(textRequest, script, type = false) {
    console.log(textRequest);
    const request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState === 4) {
            if (type !== false) {
                errorEmailPrint = document.getElementById("emailSetError");
                type === 'particulier' ? inputName = 'input_email_p' : inputName = "inputEmailC";
                emailInput = document.getElementById(inputName);
                if (request.responseText === "mail already set") {
                    errorEmailPrint.style.display = "block";
                    emailInput.style.borderColor="red";

                } else {
                    finishConnection(mail,type);
                }
            }

        }
    };
    request.open('POST', script);
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.send(textRequest);
}



function checkPassword(pwd1, pwd2, pwd1Error, pwd2Error) {
    if (pwd1.value === pwd2.value) {
        if (pwd1.value.length < 8 || pwd1.value.length > 50) {
            return unvalid_info(pwd1, pwd1Error);
        } else {
            valid_input(pwd1, pwd1Error);
            return true;
        }
    }
    
}


function finishConnection($mail,$type) {
    document.location.href = "/../index.php"

}