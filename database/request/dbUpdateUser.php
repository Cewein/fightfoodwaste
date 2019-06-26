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

    $request = "UPDATE `utilisateur` SET `etat_compte`=-1 WHERE `identifiant`=?";
    $db->exec($request, [$id]);
}

function updateUser($id, $name, $pname, $adress, $city, $email='')
{
    $db = DatabaseManager::getManager();

    $request = "UPDATE `utilisateur` SET `nom`=?,`prenom`=?,`adresse_mail`=?,`adresse`=?,`ville`=? WHERE `identifiant`=?";
    $db->exec($request, [$name, $pname, $email, $adress, $city, $id]);
}


function updatePassword($id,$password) {

    $db = DatabaseManager::getManager();

    $request = "UPDATE `utilisateur` SET `password`=? WHERE `identifiant`=?";
    $db->exec($request, [$id,$password]);
}


function inactivateUser($id) {

    $db = DatabaseManager::getManager(); 

    $request = "UPDATE `utilisateur` SET `etat_compte`= 0 WHERE `identifiant`=?"; 
    $db->exec($request, [$id]);
}