<?php
/**
 * Created by PhpStorm.
 * User: Sandrine
 * Date: 01/05/2019
 * Time: 20:04
 */

require_once __DIR__ . "/../../includes.php";
require_once __DIR__ . "/Request.php";

$requestsStatut=getRequestsByStatut($_POST['type']);

$i = 0;
$idRequestList = "";

foreach ($requestsStatut as $singleRequest) {
    $requests[$i] = new Request($singleRequest['identifiant'], $singleRequest['statut'], $singleRequest['id_collecte']);
    $idRequestList .= $requests[$i]->getId();
    if(isset($requestsStatut[$i+1])===true){
        $idRequestList .= ",";
    }
    $i++;
}

$allCreators = getInteractionsCreationByIdRequestList($idRequestList);

if(isset($requests)===true){
    foreach ($requests as $request){
        foreach ($allCreators as $creator){

            if($creator['id_demande']=$request->getId()){
                $request->setCreator($creator['id_utilisateur']);
            }
        }

        if($request->getCreator()==NULL){
            $request->setCreator("No Info");
        }

        $row = "<tr><th scope=\"row\">" . $request->getId() . "</th>";
        $row .= "<td>" . $request->getCreator() . "</td>";
        $row .= "<td>" . $request->getStatut() . "</td>";
        $row .= "<td>" . $request->getCollecte() . "</td>";

        //$row .= "<td>" . getUpdateButtons($user['identifiant']) . "</td>";
        echo $row;

    }
}
else{
    echo "No Requests to display";
}
