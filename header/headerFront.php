<?php
/**
 * Created by PhpStorm and SublimeText
 * User: Sandrine et Rebecca
 * Date: 02/04/2019 et 08/04/2019
 * Time: 16:00 et 1:10
 */

if ($pathEnd === DIR_HOME) {
    $pathIndex = "";
    $pathImg = "pictures/user.png";
} else {
    $pathIndex = $directory . 'index.php';
    $pathImg = $directory . 'pictures/users.png';
}
if ($pathEnd === 'inscription') {
    $pathInscription = "";
} else {
    $pathInscription = $directory . 'inscription/page_inscription.php';
}
if ($pathEnd === 'connection') {
    $pathConnection = "";
    $pathDisconnection = "disconnection.php";
} else {
    $pathConnection = $directory . "connection/connection.php";
    $pathDisconnection = $directory . "connection/disconnection.php";
}
if(isset($_SESSION['role'])===true){
    $role = $_SESSION['role'];
}

?>

<header id="headerFront">
    <div class="row header">
        <h1 class="nav-bar brand col-md-6">Fight Food Waste</h1>

        <nav class="navbar navbar-expand-lg navbar-light col-md-6">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item"><a class="nav-link" href=<?php echo $pathIndex ?>>Accueil</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Services</a></li>
                    <li class="nav-item"><a class="nav-link" href=<?php echo $pathInscription ?>>Inscription</a>
                    </li>
                    <!-- Personnalisation de la barre de navigation en fonction du rôle -->
                    <?php if (isset($_SESSION["id"]) === false) { ?>
                        <li class="nav-item">
                            <a class="nav-link" href=<?php echo $pathConnection ?>>Connexion</a>
                        </li>
                    <?php } else { ?>
                        <li class="nav-item ">
                            <a class="nav-link fas fa-user-circle"><li class=""></li></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href=<?php echo $pathDisconnection ?>>Déconnexion</a></li>
                        <?php switch ($role) {
                            case 'salary': ?>
                                <li class="nav-item"><a class="nav-link" href="#">Espace de travail</a>
                                </li> <!-- nom à revoir-->
                            <?php case 'volunteer': ?>
                                <li class="nav-item"><a class="nav-link" href="#">Espace des bénévoles</a>
                                </li> <!-- nom à revoir-->
                            <?php case 'merchant': ?>
                                <!-- pour les commerçants -->
                                <li class="nav-item"><a class="nav-link" href="#">Espace commerçant</a></li>
                            <?php case 'subscriber': ?>
                                <!-- pour les adherents -->
                                <li class="nav-item"><a class="nav-link" href="#">Espace adhérent</a></li>
                            <?php case 'administrator': ?>
                                <li class="nav-item"><a class="nav-link" href="#">Espace administrateur</a></li>
                            <?php default:
                                break; ?>
                            <?php } ?>
                    <?php } ?>
                </ul>
            </div>
        </nav>
    </div>
</header>