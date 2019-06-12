<?php

require_once __DIR__ . '/../../includes.php';

function getAllValidatedWonder() {

    $db = DatabaseManager::getManager();

    $request = "SELECT * FROM demande INNER JOIN interagir ON `interagir.id_demande`=`demande.identifiant` WHERE  statut='checkedTrue'"; 

    return($db -> getAll($request,[])); 

}  




function getAllReferentUsers() {
   
    $db = DatabaseManager::getManager(); 

    $request = "SELECT 'id_demande','nom','prenom','adresse','ville' FROM `utilisateur` INNER JOIN `interagir` ON 'utilisateur.identifiant' = 'interagir.id_utilisateur' ";

    return ($db->getAll($request, []));
}



