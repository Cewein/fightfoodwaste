<?php

require_once('../includes.php');
$actualDirectory=__DIR__;

if (isset($_SESSION['id']) && $_SESSION['id'] > 0) {
    $userinfo=readUser($_SESSION['id']);

    $name=$userinfo['nom'];
    $pname=$userinfo['prenom'];
    $email=$userinfo['adresse_mail'];
    $password=$userinfo['password'];
    $adress=$userinfo['adresse'];
    $city=$userinfo['ville'];

    ?>
    <html lang="fr">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Page de profil Salarié</title>

        <!-- Bootstrap core CSS -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom fonts for this template -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css" rel="stylesheet"
              type="text/css">

        <!-- Custom styles for this template -->
<!--        <link href="css/agency.min.css" rel="stylesheet">-->
        <link href="../css/header.css" rel="stylesheet">

    </head>

    <body>
    <?php require_once __DIR__.'/../front/part/headerFront.php'; ?>
    <div align="center">

        <h2>Profil de <?= $name . ' ' . $pname; ?></h2>
        <br/><br/>
        Nom : <?= $name; ?>
        <br/>
        Prénom : <?= $pname; ?>
        <br/>
        Adresse mail : <?= $email; ?>
        <br/>
        Adresse postale : <?= $adress; ?>
        <br/>
        Ville : <?= $city; ?>
        <br/>
        <br/>
        <a href="editionprofil.php">Modifier mon profil</a>
        <a href="deleteAccount.php">Supprimer mon compte</a>
        <a href="../index.php">Retour à la page d'accueil</a>
        <a href="../connection/disconnection.php">Se déconnecter</a>

    </div>
    </body>

    </html>
    <?php
} else {
    header('Location: ../front/index.php');
    exit();
}
?>