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
    const quantity = document.getElementById('inputQuantity');
    const DLC = document.getElementById('inputDLC');
    const stock = document.getElementById('inputNStock');

    const barcodeError = document.getElementById('barcodeError');
    const quantityError = document.getElementById('quantityError');
    const stockError = document.getElementById('stockError');

    let check = true;


    if (barcode.value.length !== 14) {
        barcodeError.style.display = "block";
        check = false;
    }

    if (quantity.value > 0 && quantity.value <= 50) {

    } else {
        quantityError.style.display = "block";
        check = false;
    }

    if (stock.value >= 0 && stock.value <= 10) {

    } else {
        stockError.style.display = "block";
        check = false;
    }


    if (check === true) {
        const request = new XMLHttpRequest();
        request.onreadystatechange = function () {
            if (request.readyState === 4) {
                console.log(request.responseText);//Réponse à afficher
            }
        };
        request.open('POST', '../backoffice/stock/addProduct.php');
        request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        request.send(`barcode=${barcode}&quantity=${quantity}&DLC=${DLC}&stock=${stock}`);
    }

});