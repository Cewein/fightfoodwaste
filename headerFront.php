<?php
/**
 * Created by PhpStorm and SublimeText
 * User: Sandrine et Rebecca 
 * Date: 02/04/2019 et 08/04/2019
 * Time: 16:00 et 1:10
 */
?>

<header id="headerFront">
    <div class="row header">
        <h1 class="nav-bar brand col-md-6">Fight Food Waste</h1>

        <nav class="navbar navbar-expand-lg navbar-light col-md-6">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item"><a class="nav-link" href="index.php">Accueil</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Services</a></li>
                    <li class="nav-item"><a class="nav-link" href="inscription/page_inscription.php">Inscription</a></li>
                    <!-- Personnalisation de la barre de navigation en fonction du rôle -->
                    <?php if(!isset($_SESSION["id"])) {?>
                    <li class="nav-item">
                    <img src="pictures/user.png"><a class="nav-link" href="connection/php/connection.php">Connexion</a></li>
                    <?php } else { ?>
                    <img src="/pictures/user.png">
                    <a class="nav-link" href="/connection/disconnection.php">Déconnexion</a></li>
                        <?php switch(role) {
                                    case 'salary' : ?>
                             <a class="nav-link" href="#">Espace de travail</a></li> <!-- nom à revoir-->
                             <?php   case 'volunteer' : ?>
                             <a class="nav-link" href="#">Espace des bénévoles</a></li> <!-- nom à revoir-->
                             <?php   case 'merchant' : ?><!-- pour les commerçants -->
                             <a class="nav-link" href="#">Espace commerçant</a>
                             <?php   case 'subscriber' : ?><!-- pour les adherents -->
                             <a class="nav-link" href="#">Espace adhérent</a>
                             <?php   case 'administrator' : ?>
                              <a class="nav-link" href="#">Espace administrateur</a>
                              <?php   default : 
                                        break; ?>
                        <?php } ?>
                    <?php } ?>

                            
                    <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
                </ul>
            </div>
        </nav>
    </div>
</header>


