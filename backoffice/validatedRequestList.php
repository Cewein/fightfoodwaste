<?php
/**
 * Created by VSCode.
 * User: Rebecca
 * Date: 06/05/2019
 * Time: 18:12
 */
require_once __DIR__ . '/../includes.php';
$actualDirectory = __DIR__;
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <link href="../css/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/header.css" rel="stylesheet">
    <link href="../css/general.css" rel="stylesheet">
    <link href="../css/backoffice.css" rel="stylesheet">
    <link rel="stysheet" href="../../css/validatedRequestList.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <title> Administration : Gestion des collectes </title>
</head>

<body>
    <header>
        <?php require_once __DIR__ . '/../header/headerBack.php'; ?>
    </header>
    <main>
        <br><br>
        <p>&nbsp;Bonjour<br>Voici la liste des demandes validées
            <a href="#" onclick="usersRequests('checkedTrue');">
                <img src=" ../pictures/chevron-sign-down.png" alt=" ?" title="Cliquez pour afficher la liste des adhérents qui donneront des aliments pour cette collecte">
            </a>
        </p>


        <div class="table">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Propriétaire</th>
                        <th scope="col">Statut</th>
                        <th scope="col">Collecte</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody id="tbody">

                </tbody>
            </table>
        </div>

        <!--     <table class="table" id="answers">
                <thead>
                    <tr>
                        <th scope="col">Identifiant de la demande</th>
                        <th scope="col">Nom du demandeur</th>
                        <th scope="col">Prénom du demandeur</th>
                        <th scope="col">Ville du demandeur</th>
                        <th scope="col">Adresse du demandeur</th>
                        <th scope="col">Collecte n°</th>
                    </tr>
                </thead>
                <tbody id="validatedRequest">
                </tbody>
            </table>
    -->
    </main> <br>

    </div>
    <script src="request/demandesView.js"></script>
</body>

</html>