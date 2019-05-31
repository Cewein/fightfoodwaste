<?php

function getLastTourneeNb()
{
    $db = DatabaseManager::getManager();

    $request = "SELECT MAX(`n_livraison`) FROM `livrer` ";

    return ($db->findOne($request, []));
}