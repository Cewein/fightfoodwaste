<?php

require_once __DIR__ . "/../../includes.php";

function getConnection($mail) {
    $db = DatabaseManager::getManager();

    $request = "SELECT `identifiant`,`nom`,`adresse_mail`,`password` FROM `utilisateur` WHERE `adresse_mail`= ?";
    return ($db->findOne($request, [$mail]));
}
