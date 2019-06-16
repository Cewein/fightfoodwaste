<?php
/**
 * Created by Rebecca.
 * User: Rebecca
 * Date: 08/04/2019
 * Time: 23:01
 */

require_once __DIR__ . '/../includes.php';

//verification de l'envoi du form
if (isset($_POST['connexionForm']) === true && isset($_POST['mailAddress']) === true && isset($_POST['password']) === true && $_POST['mailAddress'] !== '') {
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
            //var_dump($password);
            //Check password
            if (isset($user) === true && password_verify($password, $user['password']) === true) { 
                $id = $user['identifiant'];
                $name = $user['nom'];
                //Définition des rôles
                $allRoles = getRoleByUserId($id);
                $i=0;
                foreach ($allRoles as $uniqueRole){
                    $roles[$i]=$uniqueRole['id_role'];
                    $i++;
                }
                setUsersSession($id, $name, $mailAddress, $roles);
                header('Location: /../../fightfoodwaste/index.php');
                exit;
            } else {
                echo "Erreur, mot de passe incorrect";
            }
        }
    } else {
        http_response_code(400);
    }

} else {
    echo "Merci de compléter tous les champs de ce formulaire !";
}
