<?php
/**
 * Created by SublimeText3.
 * User: Rebecca
 * Date: 08/04/2019
 * Time: 22:43
 */

<<<<<<< HEAD
//require_once __DIR__ . '/../includes.php';

session_start();

$bdd = new PDO('mysql:host=127.0.0.1;dbname=espace_membres', 'root', '');

if (isset($_POST['formconnexion'])) {
    $mailConnect = htmlspecialchars($_POST['mailConnect']);
    $mdpConnect = sha1($_POST['mdpConnect']);
    if (!empty($mailConnect) and !empty($mdpConnect)) {
        $requser = $bdd->prepare("SELECT * FROM membres WHERE mail = ? AND motdepasse = ?");
        $requser->execute(array($mailConnect, $mdpConnect));
        $userexist = $requser->rowCount();
        if ($userexist == 1) {
            $userinfo = $requser->fetch();
            $_SESSION['id'] = $userinfo['id'];
            $_SESSION['nom'] = $userinfo['nom'];
            $_SESSION['prenom'] = $userinfo['prenom'];
            header("Location: index.php?id=" . $_SESSION['id']);
        } else {
            $erreur = "Mauvais mail ou mot de passe !";
        }
    } else {
        $erreur = "Tous les champs doivent être complétés !";
    }
}
=======
require_once __DIR__ . '/../../includes.php';
>>>>>>> cd2ea04cd90aeaa7bdc8955e8ee75b7b522d2e9c

?>

<!DOCTYPE html>
<html lang="fr">
<<<<<<< HEAD

=======
>>>>>>> cd2ea04cd90aeaa7bdc8955e8ee75b7b522d2e9c
<head>
    <title>Se connecter</title>
    <meta charset="utf-8">
    <meta name="connection" description="formulaire de description">
</head>
<<<<<<< HEAD

<body>
    <center>
        <h1>Fight Food Waste</h1>
        <form method="POST" action="" enctype="application/x-www-form-urlencoded">
            <legend>
                <fieldset>Soyez les bienvenues !!<br><br><br>
                    <label for="mail">
                    <input type="mail" name="adresseMail" placeholder="Adresse email" id="mail" required="required"><br><br>
                    <input type="password" name="password" placeholder="Mot de passe" id="pwd" required="required"><br><br>
                    <input type="button" form="connexionForm" value="Se connecter">
                </fieldset>
            </legend>
            <?php
            if (isset($erreur)) {
                echo '<font color="red">' . $erreur . "</font>";
            }
            ?>
        </form>
    </center>
</body>

</html>
=======
<body>
<center>
    <h1>Fight Food Waste</h1>
    <form action="checkConnection.php" method="post" enctype="">
        <legend>
            <fieldset>Soyez les bienvenue !!
                <input type="mail" name="adresseMail" placeholder="Adresse email" id="mail" required="required">
                <input type="password" name="password" placeholder="Mot de passe" id="pwd" required="required">
                <input type="button" value="Se connecter" onclick="checkConnection()">
            </fieldset>
        </legend>
    </form>
</center>
<script src="../js/connection.js"></script>
</body>
</html>
>>>>>>> cd2ea04cd90aeaa7bdc8955e8ee75b7b522d2e9c
