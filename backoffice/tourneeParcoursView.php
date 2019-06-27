<?php

require_once __DIR__ . '/../includes.php';
require_once __DIR__ . '/checkSalary.php';

?>

<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Administration : Tournées</title>

    <!-- Custom fonts for this template -->
    <link href="../css/BackOffice/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
          rel="stylesheet">

    <!-- Icons Link -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
          integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="../css/BackOffice/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom Style for Map -->
    <link href='https://api.tiles.mapbox.com/mapbox-gl-js/v0.53.1/mapbox-gl.css' rel='stylesheet'/>
    <link rel='stylesheet'
          href='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.2.0/mapbox-gl-geocoder.css'
          type='text/css'/>

    <!-- Custom styles for this page -->
    <link href="../css/BackOffice/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="../css/newHeader.css" rel="stylesheet">
    <link href="../css/backoffice.css" rel="stylesheet">
</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <?php require_once __DIR__ . "/navbar.php"; ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $_SESSION['name'] . " " . $_SESSION['pname'] ?></span>
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                             aria-labelledby="userDropdown">

                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Déconnexion
                            </a>
                        </div>
                    </li>

                </ul>

            </nav>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <h1 class="h3 mb-2 text-gray-800"><?= $itinerary_management ?></h1>
                <p class="mb-4" id="infosTournee"></p>

                <div class="list-group" id="displayTournees">
                    <?php require_once __DIR__ . '/tournees/displayTournees.php' ?>
                </div>

                <div id="map">
                    <iframe name="map" id="frame" src="tournees/map/map.php" width="100%" height="800px"></iframe>
                    <div id="containerButtons">
                        <button type="button" class="btn btn-outline-warning" onclick="reload()">reload</button>
                    </div>

                    <form id="listBenef" action="tournees/createPDFLivreur.php" method="POST">
                        <input class="btn btn-success" type="submit" value="Valider le trajet" onclick="generatePDF()">
                    </form>
                </div>

            </div>
            <!-- End of Main Content -->

            <?php require_once __DIR__ . '/footer.php' ?>

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <?php require_once __DIR__ . "/logoutModal.php" ?>

    <script src='https://npmcdn.com/@turf/turf/turf.min.js'></script>

    <!-- Bootstrap core JavaScript-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="../css/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Map Scripts -->
    <script src='https://api.tiles.mapbox.com/mapbox-gl-js/v0.53.1/mapbox-gl.js'></script>

    <!-- Core plugin JavaScript-->
    <script src="../css/BackOffice/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../css/BackOffice/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../css/BackOffice/jquery.dataTables.min.js"></script>
    <script src="../css/BackOffice/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../css/BackOffice/datatables-demo.js"></script>
    <script src="tournees/tourneeParcoursView.js"></script>

</body>

</html>