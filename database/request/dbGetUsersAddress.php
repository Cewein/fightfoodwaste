<?php

require_once __DIR__ . '/../../includes.php';

function getAllValidatedWonder() {

    $db = DatabaseManager::getManager();

    $request = "SELECT `identifiant` FROM `demande` WHERE `statut`='checkedTrue'"; 

    return($db -> getAll($request,[])); 

}  


function getUserId() {

    $db = DatabaseManager::getManager();

    $request = "SELECT 'id_utilisateur','identifiant','statut','id_collecte' FROM `demande` INNER JOIN `interagir` ON 'demande.identifiant'='interagir.id_demande'"; 
    
    return ($db->getAll($request, [])); 
}

function getAllReferentUsers() {
   
    $db = DatabaseManager::getManager(); 

    $request = "SELECT 'id_demande','nom','prenom','adresse','ville' FROM `utilisateur` INNER JOIN `interagir` ON 'utilisateur.identifiant' = 'interagir.id_utilisateur' ";

    return ($db->getAll($request, []));
}



