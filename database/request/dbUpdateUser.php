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

function updateUser($id, $name, $pname, $email, $adress, $city)
{
    $db = DatabaseManager::getManager();

    $request = "UPDATE `utilisateur` SET `nom`=?,`prenom`=?,`email`=?,`adresse`=?,`ville`=? WHERE `identifiant`=?";
    $db->exec($request, [$name, $pname, $email, $adress, $city, $id]);
}