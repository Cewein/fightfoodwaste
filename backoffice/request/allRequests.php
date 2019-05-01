<?php
/**
 * Created by PhpStorm.
 * User: Sandrine
 * Date: 30/04/2019
 * Time: 16:16
 */

require_once __DIR__."/../../includes.php";
require_once __DIR__."/Request.php";

$allRequests=getAllRequests();

$i=0;

foreach ($allRequests as $singleRequest){
    $request =  new Request($singleRequest['identifiant'],$singleRequest['statut'],$singleRequest['id_collecte']);

    $row = "<tr><th scope=\"row\">" . $request->getId() . "</th>";
    $row .= "<td>" . "pas encore". "</td>";
    $row .= "<td>" . $request->getStatut() . "</td>";
    $row .= "<td>" . $request->getCollecte() . "</td>";

    //$row .= "<td>" . getUpdateButtons($user['identifiant']) . "</td>";

    echo $row;
}


