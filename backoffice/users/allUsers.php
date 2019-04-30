<?php
/**
 * Created by PhpStorm.
 * User: Sandrine
 * Date: 08/04/2019
 * Time: 15:59
 */
require_once __DIR__ . '/../../includes.php';
require_once __DIR__ . '/../UpdateButtons.php';

$allUsers = getAllUsers();
$allUsersRoles = getAllUsersRoles();
$allRoles = getAllRoles();


foreach ($allUsers as $user) {
    $userRoles = "";
    foreach ($allUsersRoles as $role1User) {
        if (isset($role1User['id_utilisateur']) === true && $role1User['id_utilisateur'] === $user['identifiant']) {
            foreach ($allRoles as $role) {
                if (isset($role1User['id_role']) === true && $role1User['id_role'] === $role['identifiant']) {
                    $userRoles .= $role['nom'] ." ";
                }
            }
        }
    }

    $row = "<tr><th scope=\"row\">" . $user['identifiant'] . "</th>";
    $row .= "<td>" . $user['nom'] . "</td>";
    $row .= "<td>" . $user['prenom'] . "</td>";
    $row .= "<td>" . $user['adresse_mail'] . "</td>";
    $row .= "<td>" . $user['adresse'] . "</td>";
    $row .= "<td>" . $user['ville'] . "</td>";
    $row .= "<td>" . $userRoles . "</td>";

    $row .= "<td>" . getUpdateButtons($user['identifiant']) . "</td>";

    echo $row;
}