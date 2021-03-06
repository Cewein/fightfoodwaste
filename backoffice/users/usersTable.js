function allUsers() {
    //Switch display
    //title
    const title = document.getElementById('actualDisplay');
    title.innerText = 'Tous les utilisateurs';
    //thead
    const name = document.getElementById('userName');
    const nameBot = document.getElementById('userNameBot');
    const pname = document.getElementById('pname');
    const pnameBot = document.getElementById('pnameBot');
    const siret = document.getElementById('siret');
    const siretBot = document.getElementById('siretBot');

    name.innerText = 'Nom';
    nameBot.innerText = 'Nom';
    pname.style.display = "table-cell";
    pnameBot.style.display = "table-cell";
    siret.style.display = "table-cell";
    siretBot.style.display = "table-cell";

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
    //Switch display
    //title
    const title = document.getElementById('actualDisplay');
    title.innerText = 'Utilisateurs : ' + usersType;
    //thead
    const name = document.getElementById('userName');
    const nameBot = document.getElementById('userNameBot');
    const pname = document.getElementById('pname');
    const pnameBot = document.getElementById('pnameBot');
    const siret = document.getElementById('siret');
    const siretBot = document.getElementById('siretBot');

    const container = document.getElementById('tbody');
    container.innerText = "";

    //Change the thead with right names
    if (usersType === 'commercant') {
        name.innerText = 'Nom commerce';
        nameBot.innerText = 'Nom commerce';
        pname.style.display = "none";
        pnameBot.style.display = "none";
        siret.style.display = 'table-cell';
        siretBot.style.display = 'table-cell';
    } else {
        name.innerText = 'Nom';
        nameBot.innerText = 'Nom';
        pname.style.display = "table-cell";
        pnameBot.style.display = "table-cell";
        siret.style.display = "none";
        siretBot.style.display = "none";
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
    const typeUpdate = document.getElementById('actualDisplay').innerText;

    //Display modal with users infos
    const userId = document.getElementById('userId');
    const name = document.getElementById('modifName');
    const pname = document.getElementById('modifPname');
    const adress = document.getElementById('modifAdress');
    const city = document.getElementById('modifCity');

    const user = document.getElementById(id);
    const userInfos = user.childNodes;

    name.value = userInfos[1].innerText;
    if (typeUpdate === "Utilisateurs : particulier" || typeUpdate === "Utilisateurs : salary"){
        pname.value = userInfos[2].innerText;
    }
    adress.value = userInfos[4].innerText;
    city.value = userInfos[5].innerText;
    userId.value = id;
}

function deleteUser(id) {
    sendRequestUser(id, 'delete');
    hide(document.getElementById(id));
}

function hide(element) {
    element.style.display = 'none';
}

function sendRequestUser(id, type) {
    const request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState === 4) {
            console.log(request.responseText);
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
        sendRequest(`nom=${nameChecked}&prenom=${pnameChecked}&email=${emailChecked}&pwd=${pwdChecked}&adresse=${adress}&ville=${city}&${type}=${type}&connection=false`, '../inscription/inscription.php', type);
    }


});

//Modal de modification
document.getElementById('update_user').addEventListener('submit', function (e) {
    e.preventDefault();
    const name = document.getElementById('modifName');
    const pname = document.getElementById('modifPname');
    const adress = document.getElementById('modifAdress').value;
    const city = document.getElementById('modifCity').value;
    const userId = document.getElementById('userId').value;

    //Récupération des champs d'erreur
    const nameError = document.getElementById("nameError");
    const pnameError = document.getElementById("pnameError");

    //Déclaration des variables
    let nameChecked;
    let pnameChecked;

    let check = true;

    //Check inputs
    if (checkName(name, nameError) === true) { //Check name
        nameChecked = name.value;
    } else {
        check = false;
    }

    if (type !== 'commercant') {
        if (checkName(pname, pnameError) === true) { //Check pname (=surname)
            pnameChecked = pname.value;
        } else {
            check = false;
        }
    } else {
        pnameChecked = 'null';
    }

    if (check === true) {
        sendRequest(`name=${nameChecked}&pname=${pnameChecked}&adress=${adress}&city=${city}&id=${userId}&type=update`, '../backoffice/users/updateUsers.php');
    }

});

function sendRequest(textRequest, script, type = false) {
    const request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState === 4) {
            console.log(request.responseText);
            if (type !== false) {
                const errorEmailPrint = document.getElementById("emailSetError");
                const emailInput = document.getElementById('inputEmail');
                if (request.responseText === "mail already set") {
                    errorEmailPrint.style.display = "block";
                    emailInput.style.borderColor = "red";

                }
            } else {

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
