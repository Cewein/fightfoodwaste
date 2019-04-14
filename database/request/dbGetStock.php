<?php

require_once __DIR__ . '/../../includes.php';

function getProductIdByDemande($demande)
{
    $db = DatabaseManager::getManager();

    $request = "SELECT `identifiant` FROM `produit` WHERE `id_demande`= ?";
    return ($db->findOne($request, [$demande]));

}

function getAllProduct()
{
    $db = DatabaseManager::getManager();

    $request = "SELECT * FROM `produit`";
    return ($db->getAll($request));
}

function getProductByIdList($list)
{
    $db = DatabaseManager::getManager();

    $where = $list;

    $request = "SELECT * FROM `produit` WHERE `identifiant` IN (" . $where . " )";
    return ($db->getAll($request));
}