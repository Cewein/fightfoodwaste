<?php
/**
 * Created by Rebecca.
 * User: Rebecca
 * Date: 08/04/2019
 * Time: 23:01
 */

require_once __DIR__ . '/../../includes.php';

var_dump($_POST);
//verification de l'envoi du form
if (isset($_POST['connexionForm']) === true && isset($_POST['mailAddress']) === true && isset($_POST['password']) === true && $_POST['mailAddress'] !== '') {
    echo "ok_pour l'envoi du form";
    $mailAddress = htmlspecialchars($_POST['mailAddress']);

    $checkConnect = true;

    $password = htmlspecialchars($_POST['password'], PASSWORD_DEFAULT);
    if ($password === false) {
        echo "Mauvais password";
        $verif = false;
    }

    if (!empty($mailAddress) && !empty($password)) {

        if ($checkConnect == true) {

            $user = getConnection($mailAddress);
            //Chack password
            if (isset($user) === true && password_verify($password, $user['password']) === true) {
                $id = $user['identifiant'];
                $name = $user['nom'];
                //Définition des rôles
                $role = getRoleByUserId($id);
                $type = $role[0]['id_role'];

                setUsersSession($id, $name, $mailAddress, $type, "");
                header('Location: /../../fightfoodwaste/index.php');
                exit;
            } else {
                echo "Error : Password incorrect";
            }
        }
    } else {
        http_response_code(400);

    }

} else {
    echo "Merci de compléter tous les champs de ce formulaire !";
}
