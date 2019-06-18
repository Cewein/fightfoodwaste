<?php
/**
 * Created by PhpStorm.
 * User: Sandrine
 * Date: 14/04/2019
 * Time: 19:19
 */
require_once __DIR__ . '/../../includes.php';


if (isset($_POST['type']) === true && isset($_POST['id']) === true) {
    $type = htmlspecialchars($_POST['type']);
    $id = htmlspecialchars($_POST['id']);

    if ($type === 'delete') {
        $roles = getRoleByUserId($id);

        if (count($role) > 0) {
            foreach ($roles as $role) {
                deleteRoleByIdUserId($role['id_role'], $id);
            }


        }

        deleteUser($id);
        echo 'User deleted';

    } elseif ($type === 'admin') {
        $roles = getRoleByUserId($id);
        $allRoles = getAllRoles();

        if (count($allRoles) > 0 && count($roles) > 0) {
            $isAdmin = false;
            foreach ($allRoles as $uniqueRole) {
                if ($uniqueRole['nom'] == 'administrateur') {
                    $idAdmin = $uniqueRole['identifiant'];
                }
            }

            foreach ($roles as $role) {
                if ($role['id_role'] == $idAdmin) {
                    $isAdmin = true;
                }
            }

            if ($isAdmin === true) {//On retire le droit d'administration
                deleteRoleByIdUserId($idAdmin, $id);
                echo "Utilisateur dégradé";
            } else {
                setRoleUser($id, $idAdmin);
                echo "Utilisateur upgradé";
            }
        }
    } elseif ($type === 'update') {

        if (isset($_POST['name']) === true && isset($_POST['pname']) === true && isset($_POST['email']) === true && isset($_POST['adress']) === true && isset($_POST['city']) === true && isset($_POST['type']) === true) {
            $name = htmlspecialchars($_POST['name']);

            $pname = htmlspecialchars($_POST['pname']);
            echo strlen($pname);
            echo $pname;
            $email = htmlspecialchars($_POST['email']);
            $adress = htmlspecialchars($_POST['adress']);
            $city = htmlspecialchars($_POST['city']);
            updateUser($id, $name, $pname, $email, $adress, $city);

            echo "presque";
        }
    } else {
        echo "Error: there's no roles";
    }

} else {
    echo "Missing Value";
}
