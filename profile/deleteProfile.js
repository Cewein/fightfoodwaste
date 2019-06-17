/*function inactivate() {
     

    if(inactive) {
        let msg = "Etes-vous sûr de votre choix?"; 
        confirm(msg);
    }

} */// inactivate();   

function inactivate() {

    let inactive = document.getElementById("inactivate");
    let lastname = document.getElementById("uname"); 
    let firstname = document.getElementById("fname"); 
    let email = document.getElementById("mail");
    let password = document.getElementById("pwd"); 
    let address = document.getElementById("pAddress"); 
    let city = document.getElementById("city"); 
     


    if (confirm("Etes-vous sûr de votre choix ?")) {

        //unset of all variable 
        lastname = undefined; 
        firstname = undefined;
        email = undefined;
        password = undefined;
        address = undefined;
        city = undefined;  

        function newXmlHttpRequest() {
            if(window.newXmlHttpRequest) 
                return new XMLHttpRequest();
            return new ActiveXObject("Microsoft.XMLHTTP");  
            
        }
        

    } else {
        window.location("adaptProfile.php"); 
    }
}
