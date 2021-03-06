<?php
/**
 * Created by PhpStorm.
 * User: Sandrine
 * Date: 07/04/2019
 * Time: 22:46
 */

function setRoleUser($idUser, $idRole)
{
    $db = DatabaseManager::getManager();

    $request = "INSERT INTO `posseder`(`id_role`,`id_utilisateur`) VALUES (?,?)";

    $db->exec($request, [$idRole, $idUser]);
}

function getRoleId($nameRole)
{
    $db = DatabaseManager::getManager();

    $request = "SELECT `identifiant` FROM `role` WHERE `nom`= ?";
    return ($db->findOne($request, [$nameRole]));
}

function getAllRoles()
{
    $db = DatabaseManager::getManager();

    $request = "SELECT * FROM `role`";
    return ($db->getAll($request));
}

function getAllIdByIdRole($idRole)
{
    $db = DatabaseManager::getManager();

    $request = "SELECT `id_utilisateur` FROM `posseder` WHERE `id_role`=" . $idRole;
    return ($db->getAll($request));
}

function getAllUsersRoles()
{
    $db = DatabaseManager::getManager();

    $request = "SELECT * FROM `posseder`";
    return ($db->getAll($request));
}

function getRoleByUserId($idUser)
{
    $db = DatabaseManager::getManager();

    $request = "SELECT `id_role` FROM `posseder` WHERE `id_utilisateur`=?";
    return ($db->getAll($request, [$idUser]));

}

function deleteRoleByIdUserId($idRole, $idUser)
{
    $db = DatabaseManager::getManager();

    $request = "DELETE FROM `posseder` WHERE `id_role`=? AND `id_utilisateur`=?";
    return ($db->getAll($request, [$idRole, $idUser]));
}