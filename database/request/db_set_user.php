<?php
/**
 * Created by PhpStorm.
 * User: Sandrine
 * Date: 26/03/2019
 * Time: 23:04
 */

require_once __DIR__ . "/../../includes.php";
require_once __DIR__.'/../database.php';

function set_particulier($nom,$prenom,$mail){

    $db=DatabaseManager::getManager();

    $request="INSERT INTO `utilisateur`(`nom`,`prenom`,`adresse_mail`) VALUES (?,?,?)";
    echo $request;
    echo $nom;
    $db->exec($request,[$nom,$prenom,$mail]);


}