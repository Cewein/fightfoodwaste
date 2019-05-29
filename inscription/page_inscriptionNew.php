<?php
require_once __DIR__ . '/../includes.php';
$actualDirectory = __DIR__;
?>
<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Inscription</title>

    <!-- Custom fonts for this template-->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
          rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/BackOffice/sb-admin-2.min.css" rel="stylesheet">
    <link href="../css/inscription.css" rel="stylesheet">

</head>

<body class="bg-gradient-front">

<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                <div class="col-lg-7">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            <p>En vous inscrivant, vous avez la possibilité de participer a nos collectes et donc de
                                limiter le gaspillage alimentaire en plus de venir en aide à des personnes qui en ont
                                besoin.</p>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <button class="btn btn-secondary btn-user btn-block" onclick="visible('particulier')">
                                        Particulier
                                    </button>
                                </div>
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <button class="btn btn-info btn-user btn-block" onclick="visible('commercant')">
                                        Commerçant
                                    </button>
                                </div>
                            </div>
                        </div>
                        <form class="user" method="POST" id="inscription">
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" class="form-control form-control-user" id="input_name" name="nom" aria-describedby="Nom de famille" placeholder="Votre nom">
                                    <small id="nameError" class="form-text text-muted">Contient 1-100 caractères</small>
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control form-control-user" id="input_pname" name="prenom" aria-describedby="Prenom" placeholder="Votre prénom">
                                    <small id="PNameError" class="form-text text-muted">Contient 1-100 caractères</small>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control form-control-user" id="input_email_p" name="email" aria-describedby="Adresse Mail" placeholder="Votre adresse mail">
                                <small id="emailError" class="form-text text-muted">Contient 3-80 caractères</small>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" class="form-control form-control-user" id="input_password_p1" name="pwd" placeholder="Entrez votre mot de passe">
                                    <small id="pwd1Error" class="form-text text-muted">Contient 8-50 caractères</small>
                                </div>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control form-control-user" id="input_password_p2" placeholder="Confirmez votre mot de passe">
                                    <small id="pwd2Error" class="form-text text-muted">Les mots de passe doivent être identiques</small>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="input_adresse_p" name="adresse" placeholder="Adresse">
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="input_ville_p" name="ville" placeholder="Ville">
                            </div>
                            <input type="hidden" name="type_inscription" value="particulier">
                            <button type="submit" class="btn btn-primary">Valider</button>
                            <hr>

                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="../connection/connection.php">Déjà un compte? Se connecter!</a>
                        </div>
                        <div class="text-center">
                            <a class="small" href="../index.php">Forgot Password?</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- Bootstrap core JavaScript-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="../css/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="../css/BackOffice/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="../css/BackOffice/sb-admin-2.min.js"></script>

<!-- Scripts functions of page -->
<script src="inscription.js"></script>
<script src="page_inscription.js"></script>
</body>

</html>

