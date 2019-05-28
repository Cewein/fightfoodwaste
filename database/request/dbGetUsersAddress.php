<?php

require_once __DIR__ . '/../../includes.php';

function getAllValidatedWonder($statut) {

    $db = DatabaseManager::getManager();

    $request = "SELECT 'identifiant' FROM DEMANDE WHERE 'statut=checkedTrue'";

    return($db -> getAll($request, [$statut])); 

}  


function getUserId($idDemande) {

    $db = DatabaseManager::getManager(); 

    $request = "SELECT `id_utilisateur` FROM `demande` INNER JOIN `interagir` ON `demande.identifiant` = `interagir.id_demande`"; 
    
    return ($db->getAll($request, [$idDemande])); 
}

function getAllReferentUsers($idDemande, $name, $pname, $adress, $city) {
   
    $db = DatabaseManager::getManager(); 

    $request = "SELECT 'id_demande,nom,prenom,adresse,ville' FROM `utilisateur` INNER JOIN `interagir` ON 'utilisateur.identifiant' = 'interagir.id_utilisateur' ";

    return ($db->getAll($request, [$idDemande, $name, $pname, $adress, $city]));
}



