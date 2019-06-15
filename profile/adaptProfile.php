<?php

require_once("../includes.php");

$checkConnection = setUsersSession($id, $name, $email, $roles);

if (isset($checkConnection)) {

    switch ($_SESSION['role']) {
        case '1' :
            header('Location : profileAdherent.php');
            exit;
            break;

        case '2' :
            header('Location : profileMerchant.php');
            exit;
            break;

        case '3' :
            header('Location : profileSalary.php');
            exit;
            break;

        case '4' :
            header('Location : profileAdmin.php');  //nom à changer car c'est pour les admins
            break;

        default :
            header('Location : profileAdherent.php');
            break;
    }

}




