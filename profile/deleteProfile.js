function inactivate(id) {
    const request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        console.log(request.responseText);
        if (request.readyState === 4) {
            console.log(request.responseText);
        }
    };
    request.open('POST', '../backoffice/users/updateUsers.php');
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.send(`type=delete&id=${id}`);
}
