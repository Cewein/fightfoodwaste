function allUsers() {
    const container = document.getElementById('tbody');
    container.innerText = "";
    const textRequest = true;
    const request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState === 4) {

            container.innerHTML = request.responseText;//Réponse à afficher
        }
    };
    request.open('POST', 'allUsers.php');
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.send(textRequest);
}

function users(usersType) {
    const name = document.getElementById('name');
    const pname = document.getElementById('pname');
    const container = document.getElementById('tbody');
    container.innerText = "";
    $request = `role=${usersType}`;

    //Change the thead with right names
    if (usersType === 'commercant') {
        name.innerHTML = 'Nom commerce';
        pname.style.display = "none";
    } else {
        name.innerHTML = 'Nom';
        pname.style.display = "block";

    }

    const request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState === 4) {
            container.innerHTML = request.responseText;//Réponse à afficher
        }
    };
    request.open('POST', 'usersType.php');
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.send(`role=${usersType}`);
}

//Modal d'inscription
document.getElementById('add_user').addEventListener('submit', function (e) {
    e.preventDefault();
    const name = document.getElementById('inputName');
    const pname = document.getElementById('inputPname');
    const email = document.getElementById('inputEmail');
    const pwd = document.getElementById('inputPwd');
    let type = document.getElementById('typeUser').value;
    const adress = document.getElementById('inputAdress').value;
    const city = document.getElementById('inputCity').value;

    const admin= document.getElementById('admin').value;

    //Récupération des champs d'erreur
    const nameError = document.getElementById("nameError");
    const pnameError = document.getElementById("pnameError");
    const emailError = document.getElementById("emailError");
    const pwdError = document.getElementById("pwdError");

    //Déclaration des variables
    let nameChecked;
    let pnameChecked;
    let emailChecked;
    let pwdChecked;

    let check = true;

    //Vérification des inputs
    console.log(name.value);
    if (checkName(name, nameError) === true) { //Check name
        nameChecked = name.value;
    } else {
        check = false;
    }

    if (checkName(pname, pnameError) === true) { //Check pname (=surname)
        pnameChecked = pname.value;
    } else {
        check = false;
    }

    if (checkName(pwd, pwdError) === true) { //Check pname (=surname)
        pwdChecked = pwd.value;
    } else {
        check = false;
    }

    if (email.value.length < 2 || email.value.length > 80) { //Check email
        check = unvalid_info(email, emailError);
    } else {
        valid_input(email, emailError);
        emailChecked = email.value;
    }

    if(type==='Particulier'){
        type='particulier';
    }
    else{
        type=(type==='Commerçant'?'commercant':'salary');
    }
    console.log(type);

    if (check === true) {
        sendRequest(`nom=${nameChecked}&prenom=${pnameChecked}&email=${emailChecked}&pwd=${pwdChecked}&adresse=${adress}&ville=${city}&${type}=${type}&administrateur=${admin}'`, '../inscription/inscription.php', type);
    }



});

function sendRequest(textRequest, script, type = false) {
    console.log(textRequest);
    const request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState === 4) {
            console.log("Yay on est arrivés jsq ici");
            if (type !== false) {
                errorEmailPrint = document.getElementById("emailSetError");
                type === 'particulier' ? inputName = 'input_email_p' : inputName = "inputEmailC";
                emailInput = document.getElementById(inputName);
                if (request.responseText === "mail already set") {
                    errorEmailPrint.style.display = "block";
                    emailInput.style.borderColor="red";

                }
            }

        }
    };
    request.open('POST', script);
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.send(textRequest);
}

function checkName(name, nameError) {
    console.log(name.value);
    if (name.value.length < 2 || name.value.length > 100) {
        unvalid_info(name, nameError);
        return false;
    } else {
        valid_input(name, nameError);
        return true;
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
