<?php
session_start();

require_once __DIR__ . '/../../includes.php';

/**
 * Created by SublimeText3.
 * User: Rebecca
 * Date: 08/04/2019
 * Time: 22:43
 */

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
                    <label for="mail">Votre adresse mail :</label><br>
                    <input type="mail" name="mailAddress" placeholder="Adresse email" id="mail" required="required"><br><br>
                    <label for="password">Votre mot de passe :</label><b>r
                        <input type="password" name="password" placeholder="Mot de passe" id="pwd" required="required"><br><br>
                        <input type="submit" name="connexionForm" value="Se connecter">
                </fieldset>
            </legend>
            <?php
            if (isset($error)) {
                echo '<font color="red">' . $error . "</font>";
            }
            ?>
        </form>
    </center>
   <!-- <script src="/../js/connection.js"></script>  -->
</body>

</html>