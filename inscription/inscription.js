document.getElementById('inscription').addEventListener('submit', function(e) {
    e.preventDefault();

    const nom = document.getElementById('input_nom').value;
    const prenom = document.getElementById('input_prenom').value;
    const email = document.getElementById('input_email_p').value;
    const pwd1 = document.getElementById('input_password_p1').value;
    const pwd2= document.getElementById('input_password_p2').value;
    const adresse= document.getElementById('input_adresse_p').value;
    const ville= document.getElementById('input_ville_p').value;

    if(nom.length>100){

    }

    const request = new XMLHttpRequest();
    request.onreadystatechange = function() {
        if(request.readyState === 4) {
            console.log(request.responseText);
        }
    };
    request.open('POST', 'inscription.php');
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.send(`nom=${nom}&prenom=${prenom}&email=${email}&pwd=${pwd1}&adresse=${adresse}&ville=${ville}&particulier='particulier'`);
});
