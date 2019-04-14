<?php
/**
 * Created by PhpStorm.
 * User: Sandrine
 * Date: 14/04/2019
 * Time: 19:12
 */

function deleteUser($id)
{
    $db = DatabaseManager::getManager();

    $request = "DELETE FROM `utilisateur` WHERE `identifiant`=?";
    $db->exec($request, [$id]);
}