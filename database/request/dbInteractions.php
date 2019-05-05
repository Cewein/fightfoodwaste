<?php
/**
 * Created by PhpStorm.
 * User: Sandrine
 * Date: 01/05/2019
 * Time: 02:27
 */

require_once __DIR__ . '/../../includes.php';

function setInteraction($idUser, $idRequest, $type)
{
    $db = DatabaseManager::getManager();
    $db->exec("INSERT INTO `interagir`(`id_utilisateur`,`id_demande`,`action`) VALUES (?,?,?)",
        [$idUser, $idRequest, $type]);
}

function getInteractionsCreationByIdRequestList($list)
{
    $db = DatabaseManager::getManager();
    $where = $list;

    $request = "SELECT `id_utilisateur`,`id_demande` FROM `interagir` WHERE `id_demande` IN (" . $where . " )";
    return ($db->getAll($request, []));
}
