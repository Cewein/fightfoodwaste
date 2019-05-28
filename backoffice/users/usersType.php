<?php
/**
 * Created by PhpStorm.
 * User: Sandrine
 * Date: 08/04/2019
 * Time: 23:09
 */

require_once __DIR__ . '/../../includes.php';
require_once __DIR__ . '/../UpdateButtons.php';

$role = getRoleId($_POST['role']); //Role need to be exactly the same as the db

if (isset($role) === true) {
    $List = getAllIdByIdRole($role['identifiant']);
    $idList = "";

    if (isset($List) === true && count($List) > 0) {

        for ($i = 0; $i < count($List); $i++) {
            if (isset($List[$i]['id_utilisateur']) === true) {
                $idList .= $List[$i]['id_utilisateur'];
            }
            if (isset($List[$i]['id_utilisateur']) === true && isset($List[$i + 1]['id_utilisateur']) === true) {
                $idList .= ",";
            }
        }

        $users = getUsersByIdList($idList);

        $allUsersRoles = getAllUsersRoles();
        $allRoles = getAllRoles();

        if (isset($users) === true && count($users) > 0) {
            //Print all users + informations
            foreach ($users as $user) {
                $userRoles = "";
                //Get roles of the user
                foreach ($allUsersRoles as $role1User) {
                    if (isset($role1User['id_utilisateur']) === true && $role1User['id_utilisateur'] === $user['identifiant']) {
                        foreach ($allRoles as $role) {
                            if (isset($role1User['id_role']) === true && $role1User['id_role'] === $role['identifiant']) {
                                $userRoles .= $role['nom'] . " ";
                            }
                        }
                    }
                }

                //Print user infos
                $row = "<tr><th scope=\"row\">" . $user['identifiant'] . "</th>";
                $row .= "<td>" . $user['nom'] . "</td>";
                if (isset($user['prenom']) === true) {
                    $row .= "<td>" . $user['prenom'] . "</td>";
                }
                $row .= "<td>" . $user['adresse_mail'] . "</td>";
                $row .= "<td>" . $user['adresse'] . "</td>";
                $row .= "<td>" . $user['ville'] . "</td>";
                $row .= "<td>" . $userRoles . "</td>";

                $row .= "<td>" . getUpdateButtons($user['identifiant']) . "</td>";

                echo $row;
            }
        }
        else{
            echo "Error : No Users";
        }
    } else {
        echo "Pas d'utilisateurs de ce rôle";
    }

}