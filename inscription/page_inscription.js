function visible(item) {
    const forms =['particulier','commercant'];
    to_print=document.getElementById("form_"+item);
    if(to_print!=null){
        to_print.style.display="block";
        for(i=0;i<forms.length;i++){
            if(forms[i]!==item){
                to_hide=document.getElementById("form_"+forms[i]);
                to_hide.style.display="none";
            }
        }
    }
}