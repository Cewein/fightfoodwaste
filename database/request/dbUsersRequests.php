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

    $request = "SELECT * FROM `demande` WHERE `statut` = \"" . $statut . "\"";
    return ($db->getAll($request));
}

function getDemandeByIdList($status)
{
    $db = DatabaseManager::getManager();

    $request = "SELECT * FROM `produit` WHERE `identifiant` =" . $status;
    return ($db->getAll($request));
}

function setRequestStatut($idRequest, $statut)
{
    $db = DatabaseManager::getManager();

    $request = "UPDATE `demande` SET `statut`=? WHERE `identifiant` = ?";
    $db->exec($request, [$statut, $idRequest]);
}