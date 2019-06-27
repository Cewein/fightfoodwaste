<?php

require_once("../includes.php");

var_dump($_SESSION);
var_dump($_POST);

if (isset($_SESSION['id'])) {

    if (isset($_POST['save'])) {


        $checkUpdates = "true";

        $userInfo = readUser($_SESSION['id']);
        var_dump($userInfo);

        if (isset($_POST['newName']) && !empty($_POST['newName']) && !$userInfo['nom']) {
            $_SESSION['name'] = htmlspecialchars($_POST['newName']);
            $checkUpdates = "true";
        }

        if (isset($_POST['newFirstName']) && !empty($_POST['newFirstName']) && !$userInfo['prenom']) {
            $newPName = htmlspecialchars($_POST['newFirstName']);
            $checkUpdates = "true";
        }

        if (isset($_POST['newEmail']) && !empty($_POST['newEmail']) && !$userInfo['adresse_mail']) {
            $checkMail = getUserIdByMail($email);
            if (strlen($_POST['newEmail']) < 2 || strlen($_POST['newEmail']) < 80 && !$checkMail) {
                if (filter_var($_POST['newEmail'])) {
                    $_SESSION['email'] = htmlspecialchars($_POST['newEmail']);
                    $checkUpdates = "true";
                } else {
                    $errorMail = "Cette adresse mail n'est pas valide";
                    $checkUpdates = "false";
                }
            } else {
                $errorMail = "L'adresse mail fournie fait inférieure à 2 ou supérieure à 80 caractères";
                $checkUpdates = "false";
            }
        }

        if (isset($_POST['newPPAdress']) && !empty($_POST['newPPAdress']) && !$userInfo['addresse']) {
            $newAdress = htmlspecialchars($_POST['newPPAdress']);
            $checkUpdates = "true";
        }
        if (isset($_POST['newCity']) && !empty($_POST['newCity']) && !$userInfo['ville']) {
            $newCity = htmlspecialchars($_POST['newCity']);
            $checkUpdates = "true";
        }
        if ($checkUpdates = "true") {//$id, $name, $pname, $email, $adress, $city
            //$updateIdentity = updateUser($_SESSION['id'], $_SESSION['name'], $newPName, $_SESSION['email'], $newCity);
            var_dump($updateIdentity);
        }

    } else
        if (isset($_POST['ignore'])) {
            if (isset($_SESSION['role']) && $_SESSION['role'] == "commercant") {
                //header("Location: profileMerchant.php?id='$id'");
            } else {
                //header("Location: profile.php?id='$id'");
            }

        }


}






