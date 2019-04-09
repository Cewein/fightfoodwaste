function allUsers(){
    const container = document.getElementById('tbody');
    container.innerText="";
    const textRequest=true;
    const request = new XMLHttpRequest();
    request.onreadystatechange = function() {
        if(request.readyState === 4) {

            container.innerHTML = request.responseText;//Réponse à afficher
        }
    };
    request.open('POST', 'allUsers.php');
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.send(textRequest);
}

function users(usersType) {
    const container = document.getElementById('tbody');
    container.innerText="";
    $request=`role=${usersType}`;

    const request = new XMLHttpRequest();
    request.onreadystatechange = function() {
        if(request.readyState === 4) {
            container.innerHTML = request.responseText;//Réponse à afficher
        }
    };
    request.open('POST', 'usersType.php');
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.send(`role=${usersType}`);
}

