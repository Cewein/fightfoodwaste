<?php
require_once __DIR__ . "/../../includes.php";

if (isset($_POST['idTournee']) === true) {
    $idTournee = $_POST['idTournee'];
    $allLivraisons = getAddressesLivraisonByIdTournee($idTournee);

    $beneficiaires = " ";
    foreach ($allLivraisons as $livraison) {
        $beneficiaires .= $livraison['nom'] . "," . $livraison['adresse'] . "," . $livraison['ville'] . ";";
    }
    echo $beneficiaires;

}
