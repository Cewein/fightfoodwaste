<?php
session_start();
/**
 * Created by SublimeText3.
 * User: Rebecca
 * Date: 08/04/2019
 * Time: 22:43
 */

require_once __DIR__ . '/../../includes.php'; 
require_once __DIR__ . '/database/request/dbUserConnection.php';




/*if (isset($_POST['connexionForm'])) {
    $adresseMail = htmlspecialchars($_POST['adresseMail']);
    $password = password_hash(htmlspecialchars($_POST['password']), PASSWORD_DEFAULT);
 /*   if (!empty($adresseMail) and !empty($password)) {
        $requser = $conn->prepare("SELECT * FROM membres WHERE mail = ? AND motdepasse = ?");
        $requser->execute(array($adresseMail, $password));
        $userexist = $requser->rowCount();
        if ($userexist == 1) {
           /* $userinfo = $requser->fetch();
            $_SESSION['id'] = $userinfo['id'];
            $_SESSION['nom'] = $userinfo['nom'];
            $_SESSION['prenom'] = $userinfo['prenom'];
            header("Location: index.php?id=" . $_SESSION['id']); 
        }  else {
            $erreur = "Mauvais mail ou mot de passe !";
        }
    } else {
        $erreur = "Tous les champs doivent être complétés !";
    } 
} */

?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Se connecter</title>
        <link rel="stylesheet" href="/../../css/connection.css">
        <meta charset="utf-8">
        <meta name="connection" description="formulaire de description">
    </head>
    <body>
        <center>
            <h1>Fight Food Waste</h1>
            <form method="POST" action="" enctype="application/x-www-form-urlencoded">
                <legend>
                    <fieldset>Soyez les bienvenues !!<br><br><br>
                        <label for="mail">
                        <input type="mail" name="adresseMail" placeholder="Adresse email" id="mail" required="required"><br><br>
                        <input type="password" name="password" placeholder="Mot de passe" id="pwd" required="required"><br><br>
                        <input type="submit" name="connexionForm" value="Se connecter">
                    </fieldset>
                </legend>
                <?php
                /*
                if (isset($erreur)) {
                    echo '<font color="red">' . $erreur . "</font>";
                } */
                ?>
            </form>
        </center>
    </body>
</html>