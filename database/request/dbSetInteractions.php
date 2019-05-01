<?php
/**
 * Created by PhpStorm.
 * User: Sandrine
 * Date: 01/05/2019
 * Time: 02:27
 */

require_once __DIR__ . '/../../includes.php';

function setInteraction($idUser,$idRequest,$type,$date){
    $db = DatabaseManager::getManager();
    $db->exec("INSERT INTO `interagir`(`id_utilisateur`,`id_demande`,`date_interraction`,`action`) VALUES (?,?)",[$idUser,$idRequest,$date,$type]);
}