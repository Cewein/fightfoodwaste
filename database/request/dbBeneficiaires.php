<?php
/**
 * Created by PhpStorm.
 * User: Sandrine
 * Date: 22/05/2019
 * Time: 23:18
 */

function getAllBeneficiaires()
{
    $db = DatabaseManager::getManager();

    $request = "SELECT * FROM `beneficiaire`";
    return ($db->getAll($request));
}

function addBeneficiaire($name, $adress, $city, $lat, $long, $type)
{
    $db = DatabaseManager::getManager();

    $request = "INSERT INTO `beneficiaire`(nom,adresse,ville,Latitude, Longitude,type_beneficiaire) VALUES (?,?,?,?,?,?)";
    $db->exec($request, [$name, $adress, $city, $lat, $long, $type]);
}

function deleteBeneficiaireById($id)
{
    $db = DatabaseManager::getManager();

    $request = "DELETE FROM `beneficiaire` WHERE `identifiant`=?";
    return ($db->exec($request, [$id]));
}