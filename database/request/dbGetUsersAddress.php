<?php

require_once __DIR__ . '/../../includes.php';

function getAllValidatedWonder() {

    $db = DatabaseManager::getManager();

    $request = "SELECT * FROM `demande` WHERE `statut`='checkedTrue'"; 

    return($db -> getAll($request,[])); 

}  


function getUserId() {

    $db = DatabaseManager::getManager();

    //$request = "SELECT `id_utilisateur` FROM `demande` INNER JOIN `interagir` ON `demande.identifiant` = `interagir.id_demande`"; 
    //$request = "SELECT `id_utilisateur` FROM `demande`,INTERAGIR WHERE `demande.identifiant = interagir.id_demande`"; 
   //$request = "SELECT * FROM `interagir` AS i INNER JOIN `demande` AS d ON `i.id_demande`=`d.identifiant`"; //fonctionne mais le tableau est vide 
    //$request = "SELECT `identifiant`,`statut`, `id_collecte`, `id_utilisateur` FROM demande INNER JOIN interagir WHERE `statut`='checkedTrue'"; //idem, tableau vide (pb de colonne)
   $request = "SELECT 'id_utilisateur','identifiant','statut','id_collecte' FROM `demande` INNER JOIN `interagir` ON 'demande.identifiant'='interagir.id_demande'"; 
    
    return ($db->getAll($request, [])); 
}

function getAllReferentUsers() {
   
    $db = DatabaseManager::getManager(); 

    $request = "SELECT 'id_demande','nom','prenom','adresse','ville' FROM `utilisateur` INNER JOIN `interagir` ON 'utilisateur.identifiant' = 'interagir.id_utilisateur' ";

    return ($db->getAll($request, []));
}



