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
    $pathAdmin = "backoffice/BackHome.php";
} else {
    $pathIndex = $directory . 'index.php';
    $pathImg = $directory . 'pictures/users.png';
    $pathAdmin = $directory . "/backoffice/BackHome.php";
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

//Get all roles
$allRoles = getAllRoles();


//Get all user's roles in 1 array
if (isset($_SESSION['roles']) === true && $_SESSION['roles'] !== null) {
    $allUsersRoles = $_SESSION['roles'];
}

$roleLinks = "";


if (isset($allUsersRoles) === true) {

    //Set links for navbar according to user's roles
    foreach ($allUsersRoles as $role) {

        //get role's name from role's id
        foreach ($allRoles as $uniqueRole) {
            if (isset($role) === true && $role === $uniqueRole['identifiant']) {
                $roleName = $uniqueRole['nom'];
            }
        }

        switch ($roleName) {
            case 'particulier':
                $linkName = "Espace Particulier";
                $path = "#";
                break;
            case 'commercant':
                $linkName = "Espace Commerçant";
                $path = "#";
                break;
            case 'salary':
                $linkName = "Espace de travail";
                $path = "#";
                break;
            case 'benevole':
                $linkName = "Espace bénévole";
                $path = "#";
                break;
            case 'administrateur':
                $linkName = "Administration";
                $path = $pathAdmin;
                break;
            default:
                break;
        }

        $roleLinks .= "<li class=\"nav-item\">
                        <a class=\"nav-link \" href=" . $path . ">
                            <p class=\"fas fa-user-circle\"></p>    " . $linkName .
            "</a>
                  </li>";
    }
}
?>

<header id="headerFront">
    <div class="row header">
        <div class="col-md-1"></div>
        <h1 class="nav-bar brand col-md-4">Fight Food Waste</h1>

        <nav class="navbar navbar-expand-lg navbar-light col-md-6">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item"><a class="nav-link" href=<?php echo $pathIndex ?>>Accueil</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Services</a></li>
                    <!-- Personnalisation de la barre de navigation en fonction du rôle -->
                    <?php if (isset($_SESSION["id"]) === false) { ?>
                        <li class="nav-item"><a class="nav-link" href=<?php echo $pathInscription ?>>Inscription</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href=<?php echo $pathConnection ?>>Connexion</a>
                        </li>
                    <?php } else { ?>

                        <?php echo $roleLinks ?>

                        <li class="nav-item">
                            <a class="nav-link" href=<?php echo $pathDisconnection ?>>Déconnexion</a>
                        </li>
                    <?php } ?>
                    <div id="ytWidget"></div>
                </ul>
            </div>
        </nav>
    </div>
    <script src="https://translate.yandex.net/website-widget/v1/widget.js?widgetId=ytWidget&pageLang=hu&widgetTheme=light&autoMode=false" type="text/javascript"></script>
</header>