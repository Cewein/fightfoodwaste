<?php

require_once __DIR__ . "/../../includes.php";

$collections = getNbFoodCollection();


$lastid = -1;
foreach ($collections as $collection) {
    if ($collection['identifiant'] !== $lastid) {
        $row = "<button type='button' class='list-group-item list-group-item-action' onclick='displayMap(" . $collection['identifiant'] . ")'> Collecte n° " . $collection['identifiant'] . "</button>";

        echo $row;
    }

    $lastid = $collection['identifiant'];
}

