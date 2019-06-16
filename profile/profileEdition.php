<?php


require_once('../includes.php');
include "profileCheck.php";

?>
<html>

<head>
    <title>Page de profil utilisateur</title>
    <meta charset="utf-8">
</head>

<body>
    <div align="center">
        <?php if (isset($_SESSION['id']) and isset($_SESSION['roles']) == 'administrateur') {

            $id = ($_SESSION['id']);
            $userInfo = readUser($id);
            if ($_SESSION['id'] == $userInfo['id']) {


                ?>


                <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
                <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
                <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                <!------ Include the above in your HEAD tag ---------->

                <br><br>

                <div class="container">
                    <div class="row">
                        <div class="col-md-3 ">
                            <div class="list-group ">
                                <a href="#" class="list-group-item list-group-item-action active">Dashboard</a>
                                <a href="#" class="list-group-item list-group-item-action">User Management</a>
                                <a href="#" class="list-group-item list-group-item-action">Used</a>
                                <a href="#" class="list-group-item list-group-item-action">Enquiry</a>
                                <a href="#" class="list-group-item list-group-item-action">Dealer</a>
                                <a href="#" class="list-group-item list-group-item-action">Media</a>
                                <a href="#" class="list-group-item list-group-item-action">Post</a>
                                <a href="#" class="list-group-item list-group-item-action">Category</a>
                                <a href="#" class="list-group-item list-group-item-action">New</a>
                                <a href="#" class="list-group-item list-group-item-action">Comments</a>
                                <a href="#" class="list-group-item list-group-item-action">Appearance</a>
                                <a href="#" class="list-group-item list-group-item-action">Reports</a>
                                <a href="#" class="list-group-item list-group-item-action">Settings</a>


                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h4>Modifier vos informations de profil</h4>
                                            <hr>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <form>
                                                <div class="form-group row">
                                                    <label for="name" id="nom" class="col-4 col-form-label">Nom</label>
                                                    <div class="col-8">
                                                        <input id="username" name="username" placeholder="Username" class="form-control here" value="<?= $userInfo['nom']; ?>" required=" required" type="text">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="username" id="prenom" class="col-4 col-form-label">Prénom</label>
                                                    <div class="col-8">
                                                        <input id="name" name="name" placeholder="First Name" class="form-control here" value="<?= $userInfo['prenom']; ?>" type="text">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="email" id="mailAddress" class="col-4 col-form-label">Adresse mail</label>
                                                    <div class="col-8">
                                                        <input id="email" name="email" placeholder="Email" class="form-control here" value="<?php echo $userInfo['adresse_mail']; ?>" required="required" type="text">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="newpass" id="password" class="col-4 col-form-label">Mot de passe</label>
                                                    <div class="col-8">
                                                        <input id="newpass" name="newpass" placeholder="New Password" class="form-control here" value="<?= password_hash($userInfo['pwd'], PASSWORD_DEFAULT) ?>" type="text">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="pAddress" class="col-4 col-form-label">Adresse postale</label>
                                                    <div class="col-8">
                                                        <input id="pAddress" name="email" placeholder="Adresse" class="form-control here" value="<?= $userInfo['adresse']; ?>" required="required" type="text">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="city" id="city" class="col-4 col-form-label">Ville</label>
                                                    <div class="col-8">
                                                        <input id="city" name="city" placeholder="Ville" class="form-control here" value="<?= $userInfo['city']; ?>" required="required" type="text">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="offset-4 col-8">
                                                        <input type="button" class="btn btn-primary" name="submit" value="Enregistrer">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="offset-4 col-8">
                                                        <input type="button" class="btn btn-primary" value="Annuler">
                                                    </div>
                                                </div>
                                            </form>

                                            <a href="../index.php">Retour à la page d'accueil</a><br>
                                            <a href="../connection/php/disconnection.php">Se déconnecter</a>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </body>

        </html>
    <?php

} else {
    header('Location: ../connection/connection.php');
    exit();
}
?>

    