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
    request.open('POST', '../backoffice/users/allUsers.php'); //path from home directory
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.send(textRequest);
}

function users(usersType) {
    const name = document.getElementById('userName');
    const nameBot = document.getElementById('userNameBot');
    const pname = document.getElementById('pname');
    const pnameBot = document.getElementById('pnameBot');

    const container = document.getElementById('tbody');
    container.innerText = "";
    $request = `role=${usersType}`;

    //Change the thead with right names
    if (usersType === 'commercant') {
        name.innerHTML = 'Nom commerce';
        nameBot.innerHTML = 'Nom commerce';
        pname.style.display = "none";
        pnameBot.style.display = "none";
    } else {
        name.innerHTML = 'Nom';
        nameBot.innerHTML = 'Nom';
        pname.style.display = "block";
        pnameBot.style.display = "block";

    }

    const request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState === 4) {
            container.innerHTML = request.responseText;//Réponse à afficher
        }
    };
    request.open('POST', '../backoffice/users/usersType.php');
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.send(`role=${usersType}`);
}

function updateAdmin(id) {
    sendRequestUser(id, 'admin');

}

function updateUser(id) {
    //Display modal with users infos
    const userId = document.getElementById('userId');
    const name = document.getElementById('modifName');
    const pname = document.getElementById('modifPname');
    const email = document.getElementById('modifEmail');
    let type = document.getElementById('modiftypeUser');
    const adress = document.getElementById('modifAdress');
    const city = document.getElementById('modifCity');

    const user = document.getElementById(id);
    const userInfos = user.childNodes;

    name.value = userInfos[1].innerHTML;
    pname.value = userInfos[2].innerHTML;
    email.value = userInfos[3].innerHTML;
    adress.value = userInfos[4].innerHTML;
    city.value = userInfos[5].innerHTML;
    userId.value = id;

    console.log(user);
    console.log(userInfos);

}

function deleteUser(id) {
    sendRequestUser(id, 'delete');
}

function sendRequestUser(id, type) {
    const request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState === 4) {
            //console.log(request.responseText);//Réponse à afficher
        }
    };
    request.open('POST', '../backoffice/users/updateUsers.php');
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.send(`type=${type}&id=${id}`);
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

    if (type === 'Particulier') {
        type = 'particulier';
    } else {
        type = (type === 'Commerçant' ? 'commercant' : 'salary');
    }

    if (check === true) {
        sendRequest(`nom=${nameChecked}&prenom=${pnameChecked}&email=${emailChecked}&pwd=${pwdChecked}&adresse=${adress}&ville=${city}&${type}=${type}&connection=false`, '../../inscription/inscription.php', type);
    }


});

//Modal de modification
document.getElementById('update_user').addEventListener('submit', function (e) {
    e.preventDefault();
    const name = document.getElementById('modifName');
    const pname = document.getElementById('modifPname');
    const email = document.getElementById('modifEmail');
    let type = document.getElementById('modiftypeUser').value;
    const adress = document.getElementById('modifAdress').value;
    const city = document.getElementById('modifCity').value;
    const userId = document.getElementById('userId').value;

    //Récupération des champs d'erreur
    const nameError = document.getElementById("nameError");
    const pnameError = document.getElementById("pnameError");
    const emailError = document.getElementById("emailError");

    //Déclaration des variables
    let nameChecked;
    let pnameChecked;
    let emailChecked;

    let check = true;

    //Vérification des inputs
    if (type === 'Particulier') {
        type = 'particulier';
    } else {
        type = (type === 'Commerçant' ? 'commercant' : 'salary');
    }

    if (checkName(name, nameError) === true) { //Check name
        nameChecked = name.value;
    } else {
        check = false;
    }
    console.log(check);
    console.log(type);
    console.log(type==='commercant');


    if(type!=='commercant'){
        if (checkName(pname, pnameError) === true) { //Check pname (=surname)
            pnameChecked = pname.value;
        } else {
            check = false;
        }
    }

    console.log(check);
    if (email.value.length < 2 || email.value.length > 80) { //Check email
        check = unvalid_info(email, emailError);
    } else {
        valid_input(email, emailError);
        emailChecked = email.value;
    }


    console.log(check);
    if (check === true) {
        sendRequest(`nom=${nameChecked}&prenom=${pnameChecked}&email=${emailChecked}&adresse=${adress}&ville=${city}&type=${type}&id=${userId}`, '../backoffice/users/updateUsers.php');
        console.log(userId);
    }


});

function sendRequest(textRequest, script, type = false) {
    const request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState === 4) {
            console.log(request.responseText);
            if (type !== false) {
                errorEmailPrint = document.getElementById("emailSetError");
                emailInput = document.getElementById('inputEmail');
                if (request.responseText === "mail already set") {
                    errorEmailPrint.style.display = "block";
                    emailInput.style.borderColor = "red";

                }
            }
            else{
                console.log(request.responseText);
            }

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

function unvalid_info(input, inputError) {
    input.style.borderColor = "red";
    inputError.style.display = "block";
    return false;
}

function valid_input(input, inputError) {
    input.style.borderColor = "green";
    inputError.style.display = "none";
}
