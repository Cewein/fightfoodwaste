<?php

function getLastLivraisonNb()
{
    $db = DatabaseManager::getManager();

    $request = "SELECT MAX(`identifiant`) FROM `livraison`";

    return ($db->findOne($request, []));
}

function setLivraison($idBeneficiaire)
{
    $db = DatabaseManager::getManager();

    $request = "INSERT INTO `livraison`(`id_beneficiaire`, `etat`) VALUES  (?, 'preparation')";

    $db->exec($request, [$idBeneficiaire]);
}

function updateProductSetLivraison($idProduct, $idLivraison)
{
    $db = DatabaseManager::getManager();

    $request = "UPDATE `produit` SET `id_livraison`=? WHERE `identifiant`=?";

    $db->exec($request, [$idLivraison, $idProduct]);
}