<?php
/**
 * Created by PhpStorm and SublimeText
 * User: Sandrine et Rebecca 
 * Date: 02/04/2019 et 08/04/2019
 * Time: 16:00 et 1:10
 */
?>

<header>
    <div class="row header" id="headerFront">
        <div class="col-md-1 bar"></div>
        <div class="nav-bar col-md-3 container">
            <div class="name col-md-12 container">
                <div class="row brand">
                    <img id="logo" src="../pictures/logo_fight_food_waste.png" >
                    <h2 id="name" class="">     Fight Food Waste</h2>
                </div>

            </div>
            <div class="brandFront col-md-12"></div>
        </div>
        <div class="col-md-2 bar"></div>

        <nav class="navbar navbar-expand-lg navbar-light col-md-5">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item"><a class="nav-link" href="index.php">Accueil</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Services</a></li>
                    <li class="nav-item"><a class="nav-link" href="inscription/page_inscription.php">Inscription</a></li>
                    <!-- Personnalisation de la barre de navigation en fonction du rôle -->
                    <?php if (!isset($_SESSION["id"])) { ?>
                        <li class="nav-item">
                            <img src="pictures/user.png" alt="accédez à votre compte"><a class="nav-link" href="connection/php/connection.php">Connexion</a></li>
                    <?php } else { ?>
                        <li class="nav-item">
                            <img src="pictures/user.png" alt="accédez à votre compte">
                            <a class="nav-link" href="/connection/disconnection.php">Déconnexion</a></li>
                        <?php switch ($role) {
                            case 'salary': ?>
                            <a class="nav-link" href="#">Espace de travail</a></li> <!-- nom à revoir-->
                        <?php case 'volunteer': ?>
                            <a class="nav-link" href="#">Espace des bénévoles</a></li> <!-- nom à revoir-->
                        <?php case 'merchant': ?>
                            <!-- pour les commerçants -->
                            <a class="nav-link" href="#">Espace commerçant</a>
                        <?php case 'subscriber': ?>
                            <!-- pour les adherents -->
                            <a class="nav-link" href="#">Espace adhérent</a>
                        <?php case 'administrator': ?>
                            <a class="nav-link" href="#">Espace administrateur</a>
                        <?php default:
                        break; ?>
                        <?php } ?>
                    <?php } ?>


                    <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
                </ul>
            </div>
        </nav>
    </div>
</header>