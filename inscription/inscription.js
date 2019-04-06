document.getElementById('inscription').addEventListener('submit', function(e) {
    e.preventDefault();

    const name = document.getElementById('input_name');
    const pname = document.getElementById('input_pname');
    const email = document.getElementById('input_email_p');
    const pwd1 = document.getElementById('input_password_p1');
    const pwd2= document.getElementById('input_password_p2');
    const adress= document.getElementById('input_adresse_p').value;
    const city= document.getElementById('input_ville_p').value;
    let check=true;

    //Vérifications du contenu des inputs
    if(name.value.length<2||name.value.length>10){
        nameError=document.getElementById("nameError");
        check=unvalid_info(name,nameError);
    }
    else{
        nameError=document.getElementById("nameError");
        valid_input(name,nameError);
        name_checked=name.value;
    }

    if(pname.value.length<2||pname.value.length>10){
        pnameError=document.getElementById("PNameError");
        check=unvalid_info(pname,pnameError);
    }
    else{
        pnameError=document.getElementById("PNameError");
        valid_input(pname,pnameError);
        pname_checked=pname.value;
    }

    if(email.value.length<2||email.value.length>80){
        emailError=document.getElementById("emailError");
        check=unvalid_info(email,emailError);
    }
    else{
        emailError=document.getElementById("emailError");
        valid_input(email,emailError);
        email_checked=email.value;
    }

    if(pwd1.value===pwd2.value){
        if(pwd1.value.length<8||pwd1.value.length>50){
            pwd1Error=document.getElementById("pwd1Error");
            check=unvalid_info(pwd1,pwd1Error);
        }
        else{
            pwd1Error=document.getElementById("pwd1Error");
            valid_input(pwd1,pwd1Error);
            pwd_checked=pwd1.value;
        }
    }
    else{
        pwd2Error=document.getElementById("pwd2Error");
        check=unvalid_info(pwd2,pwd2Error);

    }



    if(check===true){
        const request = new XMLHttpRequest();
        request.onreadystatechange = function() {
            if(request.readyState === 4) {
                console.log(request.responseText);
            }
        };
        request.open('POST', 'inscription.php');
        request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        request.send(`nom=${name_checked}&prenom=${pname_checked}&email=${email_checked}&pwd=${pwd_checked}&adresse=${adress}&ville=${city}&particulier='particulier'`);
    }

});

function unvalid_info(input,inputError) {
    input.style.borderColor="red";
    inputError.style.display="block";
    return false;
}

function valid_input(input,inputError) {
    input.style.borderColor="green";
    inputError.style.display="none";
}
