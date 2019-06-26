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

    <!-- Custom styles for this page -->
    <link href="../css/BackOffice/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="../css/newHeader.css" rel="stylesheet">

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
                                <?= $logout ?>
                            </a>
                        </div>
                    </li>

                </ul>

            </nav>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <h1 class="h3 mb-2 text-gray-800"><?= $tournee_management ?></h1>
                <p class="mb-4">

                </p>

                <div class="col-lg-6">

                    <div class="card shadow mb-4">
                        <div class="card-header py-3 bg-gray-500">
                            <h6 class="m-0 font-weight-bold text-gray-900"><?= $tournee_create ?></h6>
                        </div>
                        <div class="card-body">
                            <?= $tournee_create_chitchat ?><a
                                    href="tourneeGenerateView.php"><?= $tournee_generate ?></a>
                        </div>
                    </div>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3 bg-gray-500">
                            <h6 class="m-0 font-weight-bold text-gray-900"><?= $tour_itinerary_manage ?></h6>
                        </div>
                        <div class="card-body">
                            <?= $tour_itinerary_manage_chitchat ?><a
                                    href="tourneeParcoursView.php"><?= $path_tour ?></a>
                        </div>
                    </div>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3 bg-gray-500">
                            <h6 class="m-0 font-weight-bold text-gray-900"><?= $deliver_list_generate ?></h6>
                        </div>
                        <div class="card-body">
                            <?= $deliver_list_generate_chitchat ?><a
                                    href="tourneePDFView.php"><?= $list_generate ?></a>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

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

    <!-- Bootstrap core JavaScript-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="../css/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../css/BackOffice/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../css/BackOffice/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../css/BackOffice/jquery.dataTables.min.js"></script>
    <script src="../css/BackOffice/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../css/BackOffice/datatables-demo.js"></script>

</body>

</html>