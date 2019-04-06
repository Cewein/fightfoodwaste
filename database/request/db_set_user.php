<?php
/**
 * Created by PhpStorm.
 * User: Sandrine
 * Date: 26/03/2019
 * Time: 23:04
 */

require_once __DIR__ . "/../../includes.php";
require_once __DIR__.'/../database.php';

function set_particulier($name,$pname,$mail,$pwd,$adress,$city,$state){

    $db=DatabaseManager::getManager();

    $request="INSERT INTO `utilisateur`(`nom`,`prenom`,`adresse_mail`,`password`,`adresse`,`ville`,`etat_compte`) VALUES (?,?,?,?,?,?,?)";
    $db->exec($request,[$name,$pname,$mail,$pwd,$adress,$city,$state]);


}

function set_commercant($nameShop,$SIRET,$mail,$pwd,$adress,$city,$state){

    $db=DatabaseManager::getManager();

    $request="INSERT INTO `utilisateur`(`nom`,`n_SIREN`,`adresse_mail`,`password`,`adresse`,`ville`,`etat_compte`) VALUES (?,?,?,?,?,?,?)";
    $db->exec($request,[$nameShop,$SIRET,$mail,$pwd,$adress,$city,$state]);

}