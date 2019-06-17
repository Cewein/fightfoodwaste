<?php

function getLastLivraisonNb()
{
    $db = DatabaseManager::getManager();

    $request = "SELECT MAX(`identifiant`) FROM `livraison`";

    return ($db->findOne($request, []));
}

function getLastTourneeNb()
{
    $db = DatabaseManager::getManager();

    $request = "SELECT MAX(`n_tournee`) FROM `livraison`";

    return ($db->findOne($request, []));
}

function setLivraison($idBeneficiaire, $dateTournee, $idTournee)
{
    $db = DatabaseManager::getManager();

    $request = "INSERT INTO `livraison`(`id_beneficiaire`, `date_livraison`, `etat`, `n_tournee`) VALUES  (?,?, 'preparation', ?)";

    $db->exec($request, [$idBeneficiaire, $dateTournee, $idTournee]);
}

function updateProductSetLivraison($idProduct, $idLivraison)
{
    $db = DatabaseManager::getManager();

    $request = "UPDATE `produit` SET `id_livraison`=? WHERE `identifiant`=?";

    $db->exec($request, [$idLivraison, $idProduct]);
}

function getTourneeEtatPreparation()
{
    $db = DatabaseManager::getManager();

    $request = "SELECT `n_tournee` FROM `livraison` WHERE `etat`='preparation' AND `n_tournee`>0";

    return ($db->getAll($request));
}

function getAddressesLivraisonByIdTournee($idTournee)
{
    $db = DatabaseManager::getManager();

    $request = "SELECT * FROM `livraison` INNER JOIN `beneficiaire` ON livraison.id_beneficiaire = beneficiaire.identifiant WHERE `n_tournee`=? ";

    return ($db->getAll($request, [$idTournee]));
}

function getLivraisonByIdTournee($idTournee)
{
    $db = DatabaseManager::getManager();

    $request = "SELECT * FROM `livraison` WHERE `n_tournee`=? ";

    return ($db->getAll($request, [$idTournee]));
}

function getProductByLivraisonId($idLivraison)
{
    $db = DatabaseManager::getManager();

    $request = "SELECT * FROM `produit` WHERE `id_livraison`=? ";

    return ($db->getAll($request, [$idLivraison]));
}

function getAllLivraisonByEtat($etat)
{
    $db = DatabaseManager::getManager();

    $request = "SELECT * FROM `livraison` WHERE `etat`=? AND `n_tournee`>0";

    return ($db->getAll($request, [$etat]));
}