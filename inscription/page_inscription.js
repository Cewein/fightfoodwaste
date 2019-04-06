//Change l'affichage des formulaires d'inscription
function visible(item) {
    const forms =['particulier','commercant'];
    let to_print, to_hide;

    to_print=document.getElementById("form_"+item);
    if(to_print!=null){
        to_print.style.display="block";
        for(let i=0;i<forms.length;i++){
            if(forms[i]!==item){
                to_hide=document.getElementById("form_"+forms[i]);
                to_hide.style.display="none";
            }
        }
    }
}