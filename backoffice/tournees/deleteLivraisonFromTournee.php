<?php

require_once __DIR__ . '/../../includes.php';

if (isset($_POST['idLivraison']) === true) {
    $livraison = $_POST['idLivraison'];
    cancelLivraison($livraison);
}
elseif (isset($_POST['idTournee']) === true){
    $tournee=$_POST['idTournee'];
var_dump($tournee);
    $livraisonsToCancel=getLivraisonByIdTournee($tournee);
    foreach ($livraisonsToCancel as $livraison){
        cancelLivraison($livraison['identifiant_livraison']);
    }
}

function cancelLivraison($livraison){
    setLivraisonEtat($livraison, 'canceled');

    //unset products form Livraison
    $productsLivraison = getProductByLivraisonId($livraison);
    var_dump($productsLivraison);
    if (empty($productsLivraison) !== true) {
        foreach ($productsLivraison as $product) {
            updateProductSetLivraison($product['identifiant'], NULL);
        }
    }
}