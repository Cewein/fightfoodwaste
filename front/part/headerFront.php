<?php

require_once __DIR__ . '/../../includes.php';

$path = explode('\\', $actualDirectory);
$pathEnd = $path[count($path) - 1];

if ($pathEnd !== DIR_HOME) {
    $directory = "../";
} else {
    $directory = "";
}

if ($pathEnd === DIR_HOME) {
    $pathIndex = "";
    $pathImg = "pictures/user.png";
    $pathAdmin = "backoffice/BackHome.php";
} else {
    $pathIndex = $directory . 'index.php';
    $pathImg = $directory . 'pictures/users.png';
    $pathAdmin = $directory . "backoffice/BackHome.php";
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
                $linkName = $personnalSpace;
                $path = $directory . "profile/profile.php";
                break;
            case 'commercant':
                $linkName = $personnalSpace;
                $path = $directory . "profile/profileMerchant.php";
                break;
            case 'salary':
                $linkName = $personnalSpace;
                $path = $directory . "profile/profile.php";
                $roleLinks .= "<li class=\"nav-item\">
                                    <a class=\"nav-link \" href=" . $pathAdmin . ">
                                        <p class=\"fas fa-user-circle\"></p>Administration
                                    </a>
                                </li>";
                break;
            case 'administrateur':
                $linkName = '';
                $path = '';
                break;
            case 'benevole':
                $linkName = "Espace bénévole";
                $path = $directory . "profile/profile.php";
                break;
            default:
                break;
        }

        if (isset($linkName) === true && $linkName != '') {
            $roleLinks .= "<li class=\"nav-item\">
                        <a class=\"nav-link \" href=" . $path . ">
                            <p class=\"fas fa-user-circle\"></p>    " . $linkName .
                "</a>
                       </li>";
        }
    }
}
?>

<header id="headerFront">
    <div class="row header">
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
            <div class="col-md-1"></div>
            <h1 class="nav-bar brand col-md-4">Fight Food Waste</h1>
            <div class="col-md-1"></div>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item"><a class="nav-link" href=<?= $pathIndex ?>><?= $home ?></a></li>
                    <!-- Personnalisation de la barre de navigation en fonction du rôle -->
                    <?php if (isset($_SESSION["id"]) === false) { ?>
                        <li class="nav-item"><a class="nav-link" href=<?= $pathInscription ?>><?= $register ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href=<?= $pathConnection ?>><?= $login ?></a>
                        </li>
                    <?php } else { ?>

                        <?= $roleLinks ?>
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-toggle="modal"
                               data-target="#logoutModal"><?= $logout ?></a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </nav>
    </div>
</header>