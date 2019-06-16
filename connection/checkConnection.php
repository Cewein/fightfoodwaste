<?php

require_once __DIR__ . '/../includes.php';

//verification de l'envoi du form
if (isset($_POST['mailAdress']) === true && isset($_POST['password']) === true && $_POST['mailAdress'] !== '') {
    $mailAddress = htmlspecialchars($_POST['mailAdress']);

    $checkConnect = true;

    $password = htmlspecialchars($_POST['password'], PASSWORD_DEFAULT);
    if ($password === false) {
        echo false;
        $verif = false;
    }

    if (!empty($mailAddress) && !empty($password)) {

        if ($checkConnect == true) {

            $user = getConnection($mailAddress);
            //var_dump($password);
            //Check password
            if (isset($user['nom']) === true && password_verify($password, $user['password']) === true) {
                $id = $user['identifiant'];
                $name = $user['nom'];
                $pname = $user['prenom'];

                //Définition des rôles
                $allRoles = getRoleByUserId($id);
                $i = 0;
                foreach ($allRoles as $uniqueRole) {
                    $roles[$i] = $uniqueRole['id_role'];
                    $i++;
                }

                setUsersSession($id, $name, $mailAddress, $roles, $pname);
                echo 'Done';
            } else {
                echo "Adresse mail ou mot de passe invalide";
            }
        }
    } else {
        http_response_code(400);
    }

} else {
    echo "Merci de compléter tous les champs de ce formulaire !";
}
