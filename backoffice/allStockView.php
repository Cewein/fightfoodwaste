<?php
/**
 * Created by PhpStorm.
 * User: Sandrine
 * Date: 26/03/2019
 * Time: 23:19
 */

require_once __DIR__ . '/../includes.php';
$actualDirectory=__DIR__;
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
    </head>

    <body>
    <?php require_once __DIR__ . '/../header/adaptHeader.php'; ?>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="content col-md-10">
            <div class="table">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">Code barre</th>
                        <th scope="col" id="name">Nom</th>
                        <th scope="col" id="pname">Description</th>
                        <th scope="col">ID demande</th>
                        <th scope="col">DLC</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody id="tbody">
                        <?php require_once __DIR__ . '/stock/allStock.php'; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>
    <script src="../css/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="stock/updateProduct.js"></script>
    <footer></footer>
    </body>
</html>
