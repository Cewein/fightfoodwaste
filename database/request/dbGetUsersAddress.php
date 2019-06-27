<?php

require_once __DIR__ . '/../../includes.php';

function getAllValidatedWonder() {

    $db = DatabaseManager::getManager();

    $request = "SELECT * FROM interagir INNER JOIN utilisateur ON interagir.id_utilisateur=utilisateur.identifiant WHERE `action`='checkedTrue'";
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

function setFoodCollection() {

    $db = DatabaseManager::getManager();

    $request = "INSERT INTO collecte(date_collecte, status) VALUES(NOW(), 'non faite')";

    $db->exec($request, []);
    
}

function selectLastIdCollection() {

    $db = DatabaseManager::getManager();

    $request = "SELECT MAX(identifiant) FROM collecte";

    return ($db->findOne($request, []));

}


function getValidatedwonder($id_collecte) {

    $db = DatabaseManager::getManager();

    $request = "SELECT * FROM demande WHERE id_collecte='?'"; 

    return ($db->getAll($request, [$id_collecte]));
}


function updateStateWonder($id_collecte, $identifiant) {

    $db = DatabaseManager::getManager();

    $request = "UPDATE demande SET id_collecte='lastInsertId()' WHERE `identifiant`='?'";

    $db->exec($request, [$id_collecte, $identifiant]);
}


