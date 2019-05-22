<?php
/**
 * Created by PhpStorm.
 * User: Sandrine
 * Date: 22/05/2019
 * Time: 23:18
 */

function getAllBeneficiaires(){
    $db = DatabaseManager::getManager();

    $request = "SELECT * FROM `beneficiaire`";
    return ($db->getAll($request));
}

function addBeneficiaire($name, $adress, $city, $type){
    $db = DatabaseManager::getManager();

    $request = "INSERT INTO `beneficiaire`(nom,adresse,ville,type_beneficiaire) VALUES (?,?,?,?)";
    $db->exec($request, [$name, $adress, $city, $type]);
}