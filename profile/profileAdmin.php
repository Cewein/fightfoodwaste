<?php


require_once('../includes.php');

if (isset($_GET['id']) and $_GET['id'] > 0) {
    $getid = intval($_GET['id']);
    $requser = $bdd->prepare('SELECT * FROM membres WHERE id = ?');
    $requser->execute(array($getid));
    $userinfo = $requser->fetch();
    ?>
    <html>

    <head>
        <title>Page de profil utilisateur</title>
        <meta charset="utf-8">
    </head>

    <body>
        <div align="center">
            <?php if (isset($_SESSION['id']) and isset($_SESSION['type']) == 'particulier') { ?>
                <h2>Profil de <?= $userinfo['name'] . ' ' . $userinfo['pname']; ?></h2>
                <br /><br />
                Nom : <?= $userinfo['name']; ?>
                <br />
                Prénom : <?= $userinfo['pname']; ?>
                <br />
            <?php } else if (isset($_SESSION['id']) and isset($_SESSION['type']) == 'commercant') { ?>
                <h2>Profil de <?= $userinfo['nameShop'] ?></h2>
                <br /><br />
                Nom du commerce : <?= $userinfo['nameShop']; ?>
                <br />
                Numéro de SIRET : <?= $userinfo['SIRET']; ?>
                <br />
            <?php } ?>
            Adresse mail : <?= $userinfo['mail']; ?>
            <br />
            Mot de passe : <?= password_hash($userinfo['pwd'], PASSWORD_DEFAULT) ?>
            <br />
            Adresse postale : <?= $userinfo['address']; ?>
            <br />
            Ville : <?= $userinfo['city']; ?>
            <br />
            Etat du compte ou compte actif ou inactif? : <?= $userinfo['state']; ?>
            <br />
            <?php
            if (isset($_SESSION['id']) and $userinfo['id'] == $_SESSION['id']) {
                ?>
                <br />
                <a href="editionprofil.php">Modifier mon profil</a>
                <a href="deleteAccount.php">Supprimer mon compte</a>
                <a href="../index.php">Retour à la page d'accueil</a>
                <a href="../connection/deconnection.php">Se déconnecter</a>
            <?php
        }
        ?>
        </div>
    </body>

    </html>
<?php
}
?>