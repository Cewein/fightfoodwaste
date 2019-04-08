<?php
/**
 * Created by PhpStorm.
 * User: Sandrine
 * Date: 07/04/2019
 * Time: 22:03
 */

require_once __DIR__.'/../../includes.php';

function getUserIdByMail($mail){
    $db=DatabaseManager::getManager();

    $request="SELECT `identifiant` FROM `utilisateur` WHERE `adresse_mail`= ?";
    return ($db->findOne($request,[$mail]));

}

function getAllUsers(){
    $db=DatabaseManager::getManager();

    $request="SELECT * FROM `utilisateur`";
    return ($db->getAll($request));
}

function getUsersByIdList($list){
    $where=" ";
    $db=DatabaseManager::getManager();

    for($i=0;$i<count($list)-1;$i++){
        $where.=$list[$i].", ";
    }
    $where.=$list[$i];

    $request="SELECT * FROM `utilisateur` WHERE `identifiant` IN (".$where.")";
    return ($db->getAll($request));
}