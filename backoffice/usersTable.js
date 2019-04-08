function allUsers(){
    const textRequest=true;
    const request = new XMLHttpRequest();
    request.onreadystatechange = function() {
        if(request.readyState === 4) {
            var container = document.getElementById('tbody');
            container.innerHTML = request.responseText;//Réponse à afficher
        }
    };
    request.open('POST', 'allUsers.php');
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.send(textRequest);
}

function users(usersType) {
    const request = new XMLHttpRequest();
    request.onreadystatechange = function() {
        if(request.readyState === 4) {
            var container = document.getElementById('tbody');
            container.innerHTML = request.responseText;//Réponse à afficher
        }
    };
    request.open('POST', 'usersType.php');
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.send(`role={$usersType}`);
}

