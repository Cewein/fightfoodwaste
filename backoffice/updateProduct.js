function updateProduct(id) {


}

function deleteProduct(id) {
    sendRequestProduct(id, 'delete');
}

function sendRequestProduct(id, type) {
    const request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState === 4) {
            console.log(request.responseText);//Réponse à afficher
        }
    };
    request.open('POST', 'updateProduct.php');
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.send(`type=${type}&id=${id}`);
}