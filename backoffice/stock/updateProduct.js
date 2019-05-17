function updateProduct(id) {


}

function deleteProduct(id, number) {
    sendRequestProduct(id, 'delete');
    hide(document.getElementById(number));
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

function hide(element) {
   element.style.display = 'none';
}

document.getElementById('add_product').addEventListener('submit', function (e) {
    e.preventDefault();
    const barcode = document.getElementById('inputBarcode');
});