<?php
require_once ('../includes.php');



?>

<head>
    <title>Page de profil administrateur</title>
    <meta charset="utf-8">
</head>

<body>
    <div align="center">
        <?php if (isset($_SESSION['id']) && isset($_SESSION['roles']) == 'administrateur' || isset($_SESSION['roles']) == 'salary' ||  isset($_SESSION['roles']) == 'particulier') {
            $id = ($_SESSION['id']);
            $userInfo = readUser($id);

            ?>


            <link href="../css/profileAdmin.css" rel="stylesheet">
            <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
            <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
            <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
            <!------ Include the above in your HEAD tag ---------->

            <br><br>

            <div class="container">
                <div class="row">
                    <div class="col-md-3 ">
                        <div class="list-group ">
                            <a href="../backoffice/usersTableView_v2.php" class="list-group-item list-group-item-action active">Accueil - Back office</a>
                            <a href="#" class="list-group-item list-group-item-action">Collectes</a>
                            <a href="#" class="list-group-item list-group-item-action">Tournées</a>
                            <a href="#" class="list-group-item list-group-item-action">Services</a>
                            <a href="#" class="list-group-item list-group-item-action">Contact</a>
                            <a href="../front/index.php" class="list-group-item list-group-item-action">Accueil - Front office</a>
                            <a href="#" class="list-group-item list-group-item-action">Media</a>
                            <a href="#" class="list-group-item list-group-item-action">Post</a>
                            <a href="#" class="list-group-item list-group-item-action">Category</a>
                            <a href="#" class="list-group-item list-group-item-action">New</a>
                            <a href="#" class="list-group-item list-group-item-action">Comments</a>
                            <a href="#" class="list-group-item list-group-item-action">Appearance</a>
                            <a href="#" class="list-group-item list-group-item-action">Reports</a>



                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h4>Profil de <?php echo  $userInfo['nom'] . ' ' . $userInfo['prenom']; ?></h4>
                                        <br>
                                        <img alt='avatar par défaut' src="../pictures/user.png">
                                        <hr>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="table">
                                        <table>
                                            <thead>
                                                <th>Champs</th>
                                                <th>Valeur</th>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th>Nom</th>
                                                    <td><?php echo $userInfo['nom']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Prénom</th>
                                                    <td><?php echo $userInfo['prenom']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Adresse mail</th>
                                                    <td><?php echo $userInfo['adresse_mail']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Mot de passe</th>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <th>Ville</th>
                                                    <td><?php echo $userInfo['ville']; ?></td>
                                                </tr>
                                            </tbody>

                                        </table>
                                        <br><br>
                                        <div class="form-group row">
                                            <div class="offset-4 col-8">
                                                <a href="updateProfile.php">
                                                    <input type="submit" class="btn btn-primary" name="update" value="Mettre à jour">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="offset-4 col-8">
                                                <a href="deleteProfile.php">
                                                    <input type="submit" class="btn btn-primary" name="delete" id="inactivate" value="Supprimer">
                                                </a>
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
        </div>
        <script src="deleteProfile.js"></script>
    </body>


<?php
} else {
    header('Location: ../connection/connection.php');
    exit();
}
?>