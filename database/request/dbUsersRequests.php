<?php

require_once __DIR__ . '/../../includes.php';

function getAllRequests()
{
    $db = DatabaseManager::getManager();

    $request = "SELECT * FROM `demande`";
    return ($db->getAll($request));
}

function getRequestsByStatut($statut)
{
    $db = DatabaseManager::getManager();

    $request = "SELECT * FROM `demande` WHERE `statut` = \"" . $statut ."\"";
    return ($db->getAll($request));
}

function getDemandeByIdList($status)
{
    $db = DatabaseManager::getManager();

    $request = "SELECT * FROM `produit` WHERE `identifiant` =" . $status;
    return ($db->getAll($request));
}