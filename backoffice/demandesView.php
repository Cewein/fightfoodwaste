<?php
/**
 * Created by PhpStorm.
 * User: Sandrine
 * Date: 28/04/2019
 * Time: 20:01
 */
require_once __DIR__ . '/../includes.php';
$actualDirectory = __DIR__;
?>


<!DOCTYPE html>

<html lang="fr">
<head>
    <meta charset="utf-8"/>
    <link href="../css/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/header.css" rel="stylesheet">
    <link href="../css/general.css" rel="stylesheet">
    <link href="../css/backoffice.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
          integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <title>Administration : </title>
</head>

<body>
    <?php require_once __DIR__ . '/../header/adaptHeader.php'; ?>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="content col-md-10">

            <!--Navbar Infos Users -->
            <div class="btn-group btn-group-toggle" id="buttonsUsers" data-toggle="buttons">
                <input class="btn btn-secondary" type="button" value="Toutes les demandes" onclick="allUsersRequests()">
                <input class="btn btn-secondary" type="button" value="Demandes à valider" onclick="usersRequests('tocheck')">
                <input class="btn btn-secondary" type="button" value="Demandes validées" onclick="usersRequests('checkedTrue')">
                <input class="btn btn-secondary" type="button" value="Demandes refusées" onclick="usersRequests('checkedFalse')">
                <input class="btn btn-secondary" type="button" value="Demandes refusées" onclick="usersRequests('completed')">
            </div>


            <div class="table">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Propriétaire</th>
                        <th scope="col">Statut</th>
                        <th scope="col">Collecte</th>
                    </tr>
                    </thead>
                    <tbody id="tbody">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
<script src="request/demandesView.js"></script>
</body>