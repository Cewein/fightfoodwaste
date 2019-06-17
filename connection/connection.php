<?php
require_once __DIR__ . '/../includes.php';
?>

<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Se connecter</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
          rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/BackOffice/sb-admin-2.min.css" rel="stylesheet">
    <link href="../css/connection.css" rel="stylesheet">

</head>

<body class="bg-gradient-front">

<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Soyez les bienvenus !</h1>
                                </div>
                                <form class="user" method="POST" action="" id="connection" enctype="application/x-www-form-urlencoded">
                                    <p id="error">Adresse mail ou mot de passe invalide</p>
                                    <div class="form-group">
                                        <input type="email" class="form-control form-control-user"
                                               id="mail" aria-describedby="email" name="mailAdress"
                                               placeholder="Adresse email">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user"
                                               id="pwd" placeholder="Mot de passe" name="password">
                                    </div>

                                    <input type="submit" name="connexionForm" value="Se connecter" class="btn btn-info btn-user btn-block">

                                    <hr>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="#">Mot de passe oublié?</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="../inscription/page_inscription.php">Créer un compte!</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="../index.php">Retour à l'accueil...</a>
                                </div>
                            </div>
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
<script src="connection.js"></script>

</body>

</html>

