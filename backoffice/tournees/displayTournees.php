<?php

require_once __DIR__ . "/../../includes.php";

$allTournees = getTourneeEtatPreparation();

foreach ($allTournees as $tournee) {
    $row = "<button type='button' class='list-group-item list-group-item-action' onclick='displayMap(".$tournee['n_tournee'].")'> Tournée " . $tournee['n_tournee'] . "</button>";

    echo $row;
}
