<?php
require_once('../includes.php');

if (isset($_SESSION['id']) && isset($_SESSION['roles']) == 'administrateur' || isset($_SESSION['roles']) == 'salary' || isset($_SESSION['roles']) == 'particulier') {
    $id = ($_SESSION['id']);
    $userInfo = readUser($id);
    ?>

    <head>
        <title>Page de profil administrateur</title>
        <meta charset="utf-8">
        <link href="../css/profileAdmin.css" rel="stylesheet">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet"
              id="bootstrap-css">
    </head>

    <body>
    <div align="center">


        <!------ Include the above in your HEAD tag ---------->

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
                                    <h4>Profil de <?php echo $userInfo['nom'] . ' ' . $userInfo['prenom']; ?></h4>
                                    <br>
                                    <img alt='avatar par défaut' src="../pictures/user.png">
                                    <hr>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th scope="col">Champs</th>
                                        <th scope="col">Valeur</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th><?= $name ?></th>
                                        <td><?php echo $userInfo['nom']; ?></td>
                                    </tr>
                                    <tr>
                                        <th><?= $firstname ?></th>
                                        <td><?php echo $userInfo['prenom']; ?></td>
                                    </tr>
                                    <tr>
                                        <th><?= $email ?></th>
                                        <td><?php echo $userInfo['adresse_mail']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Mot de passe</th>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th><?= $city ?></th>
                                        <td><?php echo $userInfo['ville']; ?></td>
                                    </tr>
                                    </tbody>

                                </table>
                                <br><br>
                                
                                <div class="form-group row">
                                    <div class="offset-4 col-8">
                                        <button class="btn btn-primary" id="inactivate" data-toggle="modal"
                                                data-target="#confirmModal">Supprimer
                                        </button>
                                    </div>
                                </div>

                                <a href="../connection/php/disconnection.php">Se déconnecter</a>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="deleteProfile.js"></script>
    </body>

    <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><?= $confirmDelete ?></h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal"><?= $cancel ?></button>
                    <a class="btn btn-primary" href="../connection/disconnection.php" onclick="inactivate(<?= $_SESSION['id'] ?>)"><?= $confirm ?></a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="../css/bootstrap/js/bootstrap.bundle.min.js"></script>

    <?php
} else {
    header('Location: ../connection/connection.php');
    exit();
}
?>