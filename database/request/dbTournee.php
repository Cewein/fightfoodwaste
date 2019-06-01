<?php

function getLastTourneeNb()
{
    $db = DatabaseManager::getManager();

    $request = "SELECT MAX(`n_livraison`) FROM `livrer` ";

    return ($db->findOne($request, []));
}

function setLivrer($id_produit, $id_beneficiaire, $n_livraison)
{
    $db = DatabaseManager::getManager();

    $request = "INSERT INTO `livrer`(`id_produit`, `id_beneficiaire`, `n_livraison`) VALUES  (?, ?, ?)";

    $db->exec($request, [$id_produit, $id_beneficiaire, $n_livraison]);
}