<?php

require_once __DIR__ . '/../../includes.php';

function getProductsByDemandeId($demande)
{
    $db = DatabaseManager::getManager();

    $request = "SELECT * FROM `produit` WHERE `id_demande`= ?";
    return ($db->getAll($request, [$demande]));
}

function getAllProductStocked()
{
    $db = DatabaseManager::getManager();

    $request = "SELECT * FROM `produit` WHERE `n_stock`!='NULL'";
    return ($db->getAll($request));
}

function getAllProductsFree()
{
    $db = DatabaseManager::getManager();

    $request = "SELECT * FROM `produit` WHERE `n_stock`!='NULL' AND `id_livraison` IS NULL";
    return ($db->getAll($request));
}


function getProductByIdList($list)
{
    $db = DatabaseManager::getManager();

    $where = $list;

    $request = "SELECT * FROM `produit` WHERE `identifiant` IN (" . $where . " )";
    return ($db->getAll($request));
}

function deleteProductById($id)
{
    $db = DatabaseManager::getManager();

    $request = "DELETE FROM `produit` WHERE `identifiant`=?";
    return ($db->exec($request, [$id]));
}

function getAllProductsDLC($date)
{
    $db = DatabaseManager::getManager();

    $request = "SELECT * FROM `produit` WHERE `DLC`<=?";
    return ($db->getAll($request, [$date]));
}