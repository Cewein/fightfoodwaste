document.getElementById('inscription').addEventListener('submit', function (e) {
    e.preventDefault();

    //Récupération des champs
    const name = document.getElementById('input_name');
    const pname = document.getElementById('input_pname');
    const email = document.getElementById('input_email_p');
    const pwd1 = document.getElementById('input_password_p1');
    const pwd2 = document.getElementById('input_password_p2');
    const adress = document.getElementById('input_adresse_p').value;
    const city = document.getElementById('input_ville_p').value;

    //Récupération des champs d'erreur
    const nameError = document.getElementById("nameError");
    const pnameError = document.getElementById("PNameError");
    const emailError = document.getElementById("emailError");
    const pwd1Error = document.getElementById("pwd1Error");
    const pwd2Error = document.getElementById("pwd2Error");

    //Déclaration des variables
    let name_checked;
    let pname_checked;
    let email_checked;
    let pwd_checked;

    let check = true;

    //Vérifications du contenu des inputs
    if (checkName(name, nameError) === true) { //Check name
        name_checked = name.value;
    } else {
        check = false;
    }

    if (checkName(pname, pnameError) === true) { //Check pname (=surname)
        pname_checked = pname.value;
    } else {
        check = false;
    }

    if (email.value.length < 2 || email.value.length > 80) {
        check = unvalid_info(email, emailError);
    } else {
        valid_input(email, emailError);
        email_checked = email.value;
    }

    if (checkPassword(pwd1, pwd2, pwd1Error, pwd2Error) === true) { //Check password
        pwd_checked = pwd1.value;
    } else {
        check = false;
    }

    if (check === true) {
        sendRequest(`nom=${name_checked}&prenom=${pname_checked}&email=${email_checked}&pwd=${pwd_checked}&adresse=${adress}&ville=${city}&particulier='particulier'`, 'inscription.php', 'particulier');
    }

});

document.getElementById('inscription_shop').addEventListener('submit', function (e) {
    e.preventDefault();

    //Récupération des champs
    const nameShop = document.getElementById('inputNameShop');
    const Siret = document.getElementById('inputSiret');
    const email = document.getElementById('inputEmailC');
    const pwd1 = document.getElementById('inputPwdC1');
    const pwd2 = document.getElementById('inputPwdC2');
    const adress = document.getElementById('inputAdressC').value;
    const city = document.getElementById('inputCityC').value;

    //Récupération des champs d'erreur
    const nameShopError = document.getElementById("nameError");
    const SiretError = document.getElementById("PNameError");
    const emailError = document.getElementById("emailError");
    const pwd1Error = document.getElementById("pwd1Error");
    const pwd2Error = document.getElementById("pwd2Error");

    //Déclaration des variables
    let nameShopChecked;
    let SiretChecked;
    let emailChecked;
    let pwdChecked;

    let check = true;

    //Vérification des inputs
    if (checkName(nameShop, nameShopError) === true) { //Check name
        nameShopChecked = nameShop.value;
    } else {
        check = false;
    }

    if (Siret.value.length !== 11) { //Check n° SIRET
        check = unvalid_info(Siret, SiretError);
    } else {
        valid_input(Siret, SiretError);
        SiretChecked = Siret.value;
    }

    if (email.value.length < 2 || email.value.length > 80) { //Check email
        check = unvalid_info(email, emailError);
    } else {
        valid_input(email, emailError);
        emailChecked = email.value;
    }

    if (checkPassword(pwd1, pwd2, pwd1Error, pwd2Error) === true) { //Check password
        pwdChecked = pwd1.value;
    } else {
        check = false;
    }

    //Check if email is unknown
    sendRequest(`email=${email.value}`, 'checkEmail');


    if (check === true) {
        sendRequest(`name=${nameShopChecked}&Siret=${SiretChecked}&email=${emailChecked}&pwd=${pwdChecked}&adress=${adress}&city=${city}&commercant='commercant'`, 'inscription.php', 'commercant');
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
                console.log(emailInput);
                if (request.responseText === "mail already set") {
                    errorEmailPrint.style.display = "block";
                    emailInput.style.borderColor="red";

                } else {
                    window.location.replace("index.php");
                }
            }
            console.log(request.responseText);
        }
    };
    request.open('POST', script);
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.send(textRequest);
}

function checkName(name, nameError) {
    if (name.value.length < 2 || name.value.length > 100) {
        unvalid_info(name, nameError);
        return false;
    } else {
        valid_input(name, nameError);
        return true;
    }
}

function checkPassword(pwd1, pwd2, pwd1Error, pwd2Error) {
    if (pwd1.value === pwd2.value) {
        if (pwd1.value.length < 8 || pwd1.value.length > 50) {
            return unvalid_info(pwd1, pwd1Error);
        } else {
            valid_input(pwd1, pwd1Error);
            return true;
        }
    } else {
        return unvalid_info(pwd2, pwd2Error);
    }
}

function unvalid_info(input, inputError) {
    input.style.borderColor = "red";
    inputError.style.display = "block";
    return false;
}

function valid_input(input, inputError) {
    input.style.borderColor = "green";
    inputError.style.display = "none";
}

