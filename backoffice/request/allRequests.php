<?php
/**
 * Created by PhpStorm.
 * User: Sandrine
 * Date: 30/04/2019
 * Time: 16:16
 */

require_once __DIR__ . "/../../includes.php";
require_once __DIR__ . "/Request.php";
require_once __DIR__ . "/../UpdateButtons.php";

$allRequests = getAllRequests();

$i = 0;
$idRequestList = "";
foreach ($allRequests as $singleRequest) {
    $requests[$i] = new Request($singleRequest['identifiant'], $singleRequest['statut'], $singleRequest['id_collecte']);
    $idRequestList .= $requests[$i]->getId();
    if(isset($allRequests[$i+1])===true){
        $idRequestList .= ",";
    }
    $i++;
}

$allCreators = getInteractionsCreationByIdRequestList($idRequestList);

foreach ($requests as $request){
    foreach ($allCreators as $creator){

        if($creator['id_demande']=$request->getId()){
            $request->setCreator($creator['id_utilisateur']);
        }
    }

    if($request->getCreator()==NULL){
        $request->setCreator("No Info");
    }

    $row = "<tr id=\"" . $request->getId() . " \"><th scope=\"row\">" . $request->getId() . "</th>";
    $row .= "<td>" . $request->getCreator() . "</td>";
    $row .= "<td>" . $request->getStatut() . "</td>";
    $row .= "<td>" . $request->getCollecte() . "</td>";

    $row .= "<td>" . getRequestButtons($request->getId()) . "</td>";
    echo $row;

}


