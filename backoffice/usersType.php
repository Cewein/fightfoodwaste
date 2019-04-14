<?php
/**
 * Created by PhpStorm.
 * User: Sandrine
 * Date: 08/04/2019
 * Time: 23:09
 */

require_once __DIR__ . '/../includes.php';

$role = getRoleId($_POST['role']); //Role need to be exactly the same as the db
if (isset($role) === true) {
    $List = getAllIdByIdRole($role['identifiant']);
    $idList = "";

    if(isset($List)===true&&count($List)>0){

        for ($i = 0; $i < count($List); $i++) {
            if (isset($List[$i]['id_utilisateur']) === true) {
                $idList .= $List[$i]['id_utilisateur'];
            }
            if (isset($List[$i + 1]['id_utilisateur']) === true) {
                $idList .= ",";
            }
        }

        $users = getUsersByIdList($idList);
        foreach ($users as $user) {
            $row = "<tr><th scope=\"row\">" . $user['identifiant'] . "</th>";
            $row .= "<td>" . $user['nom'] . "</td>";
            if (isset($user['prenom']) === true) {
                $row .= "<td>" . $user['prenom'] . "</td>";
            }
            $row .= "<td>" . $user['adresse_mail'] . "</td>";
            $row .= "<td>" . $user['adresse'] . "</td>";
            $row .= "<td>" . $user['ville'] . "</td>";
            $row .= "<td>" . $_POST['role'] . "</td>";

            echo $row;
        }
    }
    else{
        echo "Pas d'utilisateurs de ce rôle";
    }

}