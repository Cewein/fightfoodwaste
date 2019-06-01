<?php
require_once __DIR__ . "/../../includes.php";

$lastIdTournee = getLastTourneeNb();

if ($lastIdTournee['MAX(`n_livraison`)'] === '') {
    $idTournee = 0;
} else {
    $idTournee = $lastIdTournee['MAX(`n_livraison`)'] + 1;
}

echo $idTournee;