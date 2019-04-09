<?php
/**
 * Created by PhpStorm.
 * User: Sandrine
 * Date: 08/04/2019
 * Time: 23:09
 */
require_once __DIR__.'/../includes.php';

$role=getRoleId($_POST['role']);
$List=getAllIdByIdRole($role['identifiant']);
$idList="";

for($i=0;$i<count($List)-1;$i++){
    $idList.=$List[$i]['id_utilisateur'].",";
}

$idList.=$List[$i]['id_utilisateur'];

$users=getUsersByIdList($idList);
foreach($users as $user){
    $row="<tr><th scope=\"row\">".$user['identifiant']."</th>";
    $row.="<td>".$user['nom']."</td>";
    $row.="<td>".$user['prenom']."</td>";
    $row.="<td>".$user['adresse_mail']."</td>";
    $row.="<td>".$user['adresse']."</td>";
    $row.="<td>".$user['ville']."</td>";
    $row.="<td>".$_POST['role']."</td>";

    echo $row;
}