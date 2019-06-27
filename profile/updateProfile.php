<?php


require_once('../includes.php');
include("profileCheck.php");

if (isset($_SESSION['id'])) {

    $id = ($_SESSION['id']);
    $userInfo = readUser($id);
    ?>
    <html lang="fr">

<head>
    <title>Page de profil utilisateur</title>
    <meta charset="utf-8">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="../css/updateProfile.css" rel="stylesheet">
</head>

<body>
<div align="center">


    <br><br>

    <div class="container">
        <div class="row">
            <div class="col-md-3 ">
                <div class="list-group ">
                    <a href="../front/index.php" class="list-group-item list-group-item-action">Accueil - Front
                        office</a>
                    <a href="#" class="list-group-item list-group-item-action"><?= $collecte ?></a>
                    <a href="#" class="list-group-item list-group-item-action">Tournées</a>
                    <a href="#" class="list-group-item list-group-item-action">Services</a>
                    <a href="#" class="list-group-item list-group-item-action">Contact</a>

                </div>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h4>Modifier vos informations personnelles</h4>
                                <br>
                                <img alt='avatar par défaut' src="../pictures/user.png">
                                <hr>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <form action="updateProfile.php" method="POST">
                                    <?php if (isset($_SESSION['roles']) == 'administrateur' || isset($_SESSION['roles']) == 'salary' || isset($_SESSION['roles']) == 'particulier') { ?>
                                        <div class="form-group row">
                                            <label for="newName" id="nom"
                                                   class="col-4 col-form-label"><?= $name ?></label>
                                            <div class="col-8">
                                                <input id="newName" name="newName" placeholder="Nom"
                                                       class="form-control here" value="<?= $userInfo['nom']; ?>"
                                                       required=" required" type="text">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="pname" id="prenom"
                                                   class="col-4 col-form-label"><?= $firstname ?></label>
                                            <div class="col-8">
                                                <input id="firstname" name="newFirstName" placeholder="firstname"
                                                       class="form-control here" value="<?= $userInfo['prenom']; ?>"
                                                       required=" required" type="text">
                                            </div>
                                        </div>
                                    <?php } else if (isset($_SESSION['roles']) == 'commercant') { ?>
                                        <div class="form-group row">
                                            <label for="name" id="nom" class="col-4 col-form-label">Nom du
                                                commerce</label>
                                            <div class="col-8">
                                                <input id="storeName" name="newStoreName" placeholder="Nom du commerce"
                                                       class="form-control here" value="<?= $userInfo['nom']; ?>"
                                                       required=" required" type="text">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="name" id="nom" class="col-4 col-form-label">Numéro de
                                                SIREN</label>
                                            <div class="col-8">
                                                <input id="nbSiren" name="nbSiren" placeholder="Numéro de SIREN"
                                                       class="form-control here" value="<?= $userInfo['n_SIREN']; ?>"
                                                       required=" required" type="text">
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <div class="form-group row ">
                                        <label for="email" id="mailAddress"
                                               class="col-4 col-form-label"><?= $email ?></label>
                                        <div class="col-8">
                                            <input id="email" name="newEmail" placeholder="Email"
                                                   class="form-control here"
                                                   value="<?php echo $userInfo['adresse_mail']; ?>" required="required "
                                                   type="email">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="newpass" id="password" class="col-4 col-form-label">Mot de
                                            passe</label>
                                        <div class="col-8">
                                            <input id="new pass" name="newPass" placeholder="un nouveau mot de passe ? "
                                                   class="form-control here" value="" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="newpass2" id=" password2" class="col-4 col-form-label">Confirmation
                                            du mot de passe</label>
                                        <div class="col-8">
                                            <input id="newpass2" name="newPass2"
                                                   placeholder="Retapez votre mot de passe " class="form-control here"
                                                   value="" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group row ">
                                        <label for="pAddress" id="pAddress" class="col-4 col-form-label">Adresse
                                            postale</label>
                                        <div class="col-8">
                                            <input id="pAddress" name="newPAddress" placeholder="Adresse postale"
                                                   class="form-control here" value="<?php echo $userInfo['adresse']; ?>"
                                                   required="required " type="text">
                                        </div>
                                    </div>
                                    <div class="form-group row ">
                                        <label for="city" id="city" class="col-4 col-form-label">ville</label>
                                        <div class="col-8">
                                            <input id="city" name="newCity" placeholder="Ville"
                                                   class="form-control here" value="<?php echo $userInfo['ville']; ?>"
                                                   required="required " type="text">
                                        </div>
                                    </div>
                                    <div class=" form-group row">
                                        <div class="offset-4 col-8">

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="offset-4 col-8">
                                            <a href="deleteProfile.php">
                                                <input type="submit" class="btn btn-primary" name="ignore"
                                                       id="inactivate" value="Annuler">
                                            </a>
                                        </div>
                                    </div>
                                    <a href="../connection/php/disconnection.php">Se déconnecter</a>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php if (isset($error)) {
    echo $error;
} ?>
<script src="deleteProfile.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="../css/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>


    <?php
} else {
    header('Location: ../connection/connection.php');
    exit();
}
?>