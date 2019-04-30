<?php
/**
 * Created by PhpStorm.
 * User: Sandrine
 * Date: 29/04/2019
 * Time: 09:30
 */

require_once __DIR__ . '/../includes.php';

//verification de l'envoi du form
if (isset($_GET['email']) === true && isset($_GET['passwd']) === true) {
    $mailAddress = htmlspecialchars($_GET['email']);


    $password = htmlspecialchars($_GET['passwd'], PASSWORD_DEFAULT);
    if (!empty($mailAddress) && !empty($password)) {
        $user = getConnection($mailAddress);
        //Check password
        if (isset($user) === true && password_verify($password, $user['password']) === true) {
            $id = $user['identifiant'];
            $name = $user['nom'];

            $usersInfos = $user['identifiant'];
            echo $usersInfos;

        } else {
            echo "Error : Password incorrect";
        }

    } else {
        http_response_code(400);
    }
}