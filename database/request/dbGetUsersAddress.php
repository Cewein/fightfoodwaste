<?php

require_once __DIR__ . '/../../includes.php';

function getAllValidatedWonder() {

    $db = DatabaseManager::getManager();

    $request = "SELECT * FROM interagir INNER JOIN utilisateur ON interagir.id_utilisateur=utilisateur.identifiant WHERE `action`='creation'";
 //   $request = "SELECT * FROM utilisateur INNER JOIN interagir ON `interagir.id_utilisateur`=`utilisateur.identifiant` WHERE  `action`='checkedTrue'"; 

    return ($db -> getAll($request,[])); 

}  


function getStateFoodCollection() {
    $db = DatabaseManager::getManager();

    $request = "SELECT * FROM collecte WHERE status!='finie'";

    return ($db -> getAll($request)); 
}


function getOldStateFoodCollection()
{
    $db = DatabaseManager::getManager();

    $request = "SELECT * FROM collecte WHERE status='finie'";

    return ($db->getAll($request));
}


function getNbFoodCollection() {

    $db = DatabaseManager::getManager();

    $request = "SELECT `identifiant` FROM collecte WHERE status!='finie'";

    return ($db->getAll($request)); 

}