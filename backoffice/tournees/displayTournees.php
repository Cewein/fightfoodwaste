<?php

require_once __DIR__ . "/../../includes.php";

$allTournees = getTourneeEtatPreparation();
$lastid=-1;
foreach ($allTournees as $tournee) {
    if($tournee['n_tournee']!==$lastid){
        $row = "<button type='button' class='list-group-item list-group-item-action' onclick='displayMap(".$tournee['n_tournee'].")'> Tournée " . $tournee['n_tournee'] . "</button>";

        echo $row;
    }

    $lastid=$tournee['n_tournee'];
}
