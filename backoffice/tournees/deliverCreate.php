<?php
require_once __DIR__ . "/../../includes.php";

if (isset($_POST['productsSelected']) === true && isset($_POST['idBeneficiaire']) === true && isset($_POST['dateTournee']) === true && isset($_POST['idTournee']) === true) {
    $products = explode(',', $_POST['productsSelected']); //String => array
    $beneficiaire = $_POST['idBeneficiaire'];
    $dateTournee = $_POST['dateTournee'];
    $idTournee = $_POST['idTournee'];
var_dump($dateTournee);
    setLivraison($beneficiaire, $dateTournee, $idTournee);

    $lastIdLivraison = getLastLivraisonNb();

    if ($lastIdLivraison["MAX(`identifiant`)"] === '') {
        $idLivraison = 0;
    } else {
        $idLivraison = $lastIdLivraison["MAX(`identifiant`)"];
    }

    //Ajouter pour chaque produit l'id de la livraison
    foreach ($products as $product) {
        updateProductSetLivraison($product, $idLivraison);
    }

    //Créer un dossier pour la collecte (id Tournee) si non existant + créer le pdf de la livraison

} else {
    echo 'Missing Values';
}