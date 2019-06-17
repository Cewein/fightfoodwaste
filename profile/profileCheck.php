<?php

require_once ("../includes.php");

if(isset($_SESSION['id'])) {

    if (isset($_POST['submit'])) {
        $checkUpdates = "true";
        if (isset($_POST['nom']) && !empty($_POST['nom']) && !$userInfo['nom']) {
            $_SESSION['name'] = htmlspecialchars($_POST['nom']);
            $checkUpdates = "true";
        }

        if (isset($_POST['prenom']) && !empty($_POST['prenom']) && !$userInfo['prenom']) {
            $newPName = htmlspecialchars($_POST['prenom']);
            $checkUpdates = "true";
        }

        if (isset($_POST['adresse_mail']) && !empty($_POST['adresse_mail']) && !$userInfo['adresse_mail']) {
            $checkMail = getUserIdByMail($email);
            if (strlen($_POST['adresse_mail']) < 2 || strlen($_POST['adresse_mail']) < 80 && !$checkMail) {
                if (filter_var($_POST['adresse_mail'])) {
                    $_SESSION['email'] = htmlspecialchars($_POST['adresse_mail']);
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

        if (isset($_POST['adresse']) && !empty($_POST['adresse']) && !$userInfo['adresse']) {
            $newAdress = htmlspecialchars($_POST['adresse']);
            $checkUpdates = "true";
        }
        if (isset($_POST['ville']) && !empty($_POST['ville']) && !$userInfo['ville']) {
            $newCity = htmlspecialchars($_POST['ville']);
            $checkUpdates = "true";
        }
        if($checkUpdates = "true") {
            $updateIdentity = updateUser($_SESSION['id'],$_SESSION['email'],$newPName,$_SESSION['email'],$newCity); 
            var_dump($updateIdentity);
        }
      
    } else 
    if (isset($_POST['ignore'])) {
        header("Location: profileAdmin.php");
    }

}





