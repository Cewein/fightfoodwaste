<?php
/**
 * Created by PhpStorm.
 * User: Sandrine
 * Date: 26/03/2019
 * Time: 23:19
 */

require_once __DIR__.'/includes.php';
?>


<!DOCTYPE html>

<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <link href="css/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="css/header.css" rel="stylesheet">
        <link href="css/general.css" rel="stylesheet">
        <title>Page Principale</title>
    </head>

    <body>
       <?php
       if(isset($_SESSION['role'])===true&&$_SESSION['role']=='salary'){
            require_once __DIR__.'/headerBack.php';
       }
       else{
           require_once __DIR__ . '/headerFront.php';
       }
       ?>
        <div class="content">
        <?php if(isset($_SESSION['role'])===true&&$_SESSION['role']==='particulier'){
            echo "pfiou";
        } ?>
        </div>

        <footer></footer>
    </body>
</html>
