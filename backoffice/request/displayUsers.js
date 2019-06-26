function checkNbDemande() {
    let button = document.getElementById("collectionCreate");
    var check = document.getElementsByClassName("form-check-input");
    let compt = 0;
    let i = 0;

    var checkedBoxes = getCheckedBoxes("checkbox[]");
    if(checkedBoxes.length >= 1) {
        button.removeAttribute("disabled");
    } else {
        button.setAttribute("disabled", "");
    }

}

// Pass the checkbox name to the function
function getCheckedBoxes(chkboxName) {
    var checkboxes = document.getElementsByName(chkboxName);
    var checkboxesChecked = [];
    // loop over them all
    for (var i = 0; i < checkboxes.length; i++) {
        // And stick the checked ones onto an array...
        if (checkboxes[i].checked) {
            checkboxesChecked.push(checkboxes[i]);
        }
    }
    // Return the array if it is non-empty, or null
    return checkboxesChecked.length > 0 ? checkboxesChecked : null;
}

