<?php
/**
 * Created by PhpStorm.
 * User: Sandrine
 * Date: 26/03/2019
 * Time: 23:19
 */

require_once __DIR__.'/includes.php';
$actualDirectory=__DIR__;
?>


<!DOCTYPE html>

<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <link href="css/general.css" rel="stylesheet">
        <link href="css/header.css" rel="stylesheet">
        <link href="css/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
              integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <title>Page Principale</title>
    </head>

    <body>
       <?php
       require_once __DIR__.'/header/adaptHeader.php';
       ?>
        <div class="content">

        </div>

        <?php require_once __DIR__."/footer.php"?>
    </body>
</html>
