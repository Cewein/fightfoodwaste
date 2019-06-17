<?php
require_once __DIR__ . "/../../includes.php";

$lastIdTournee = getLastTourneeNb();

$idTournee = $lastIdTournee["MAX(`n_tournee`)"] + 1;
echo $idTournee;