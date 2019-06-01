<?php
require_once __DIR__ . "/../../includes.php";
var_dump($_POST);
if (isset($_POST['productsSelected']) === true && isset($_POST['idBeneficiaire']) === true && isset($_POST['idDeliver']) === true) {
    $products = $_POST['productsSelected'];
    $beneficiaire = $_POST['idBeneficiaire'];
    $deliver= $_POST['idDeliver'];

    //Ajouter pour chaque produit une ligne dans la table livrer
    foreach ($products as $product){
        var_dump($product);
        setLivrer($product,$beneficiaire,$deliver);
    }
    var_dump($products);
    //Créer un dossier pour la collecte (id Tournee) si non existant + créer le pdf de la livraison

} else {
    echo 'Missing Values';
}