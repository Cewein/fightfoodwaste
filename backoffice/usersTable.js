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

