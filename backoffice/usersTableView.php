<?php
/**
 * Created by PhpStorm.
 * User: Sandrine
 * Date: 26/03/2019
 * Time: 23:19
 */

require_once __DIR__.'/../includes.php';

?>


<!DOCTYPE html>

<html lang="fr">
<head>
    <meta charset="utf-8" />
    <link href="../css/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/header.css" rel="stylesheet">
    <link href="../css/general.css" rel="stylesheet">
    <link href="../css/backoffice.css" rel="stylesheet">
    <title>Administration : </title>
</head>

<body>
    <?php  require_once __DIR__.'/../headerBack.php'; ?>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="content col-md-10">

            <div class="btn-group btn-group-toggle" id="buttonsUsers" data-toggle="buttons">
                <input class="btn btn-secondary" type="button" value="Afficher tous les utilisateurs" onclick="allUsers()">
                <input class="btn btn-secondary" type="button" value="Afficher particuliers" onclick="users('particulier')">
                <input class="btn btn-secondary" type="button" value="Afficher commercants" onclick="users('commercant')">
                <input class="btn btn-secondary" type="button" value="Afficher salariés" onclick="users('salary')">
            </div>

            <div class="table">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Prenom</th>
                        <th scope="col">Adresse Email</th>
                        <th scope="col">Adresse</th>
                        <th scope="col">Ville</th>
                        <th scope="col">Role(s)</th>
                    </tr>
                    </thead>
                    <tbody id="tbody">

                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>
    <script src="usersTable.js"></script>
<footer></footer>
</body>
</html>
