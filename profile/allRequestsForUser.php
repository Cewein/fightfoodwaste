<?php
/**
 * Created by PhpStorm.
 * User: Sandrine
 * Date: 30/04/2019
 * Time: 16:16
 */

require_once __DIR__ . "/../includes.php";
require_once __DIR__ . "/../backoffice/request/Request.php";

$idrequestsCreated = getRequestCreatedByUserId($_SESSION['id']);

foreach ($idrequestsCreated as $request) {

    $requestInfos = getRequestbyRequestId($request['id_demande']);

    $requestDisplay = new Request($requestInfos['identifiant'], $requestInfos['statut'], $requestInfos['id_collecte']);
    $row = "<tr id=\"" . $requestDisplay->getId() . "\"><th scope=\"row\">" . $requestDisplay->getId() . "</th>";

    $row .= "<td>" . $requestDisplay->getStatut() . "</td>";
    $row .= "<td>" . $requestDisplay->getCollecte() . "</td>";

    echo $row;
}
