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

    <link href="../css/backoffice.css" rel="stylesheet">

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
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Profile
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                Settings
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                Activity Log
                            </a>
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
                <h1 class="h3 mb-2 text-gray-800"><?= $tour_creation ?></h1>
                <p class="mb-4" id="stepTitle">
                    <?= $tour_creation_chitchat ?>
                </p>
                <p id="beneficiaireError"><?= $no_benef_selected ?></p>
                <form id="select_beneficiaires">
                    <div class="form-group col-6">
                        <label for="dateTournee" class="col"><?= $date_tour ?></label>
                        <input name="dateTournee" type="date" id="dateTournee" class="form-control">
                        <small id="dateError">Date incorrecte !</small>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable">
                            <thead>
                            <tr>
                                <th><?= $id ?></th>
                                <th><?= $name ?></th>
                                <th><?= $address ?></th>
                                <th><?= $city ?></th>
                                <th><?= $typeofbeneficiary ?></th>
                                <th><?= $selection ?></th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th><?= $id ?></th>
                                <th><?= $name ?></th>
                                <th><?= $address ?></th>
                                <th><?= $city ?></th>
                                <th><?= $typeofbeneficiary ?></th>
                                <th><?= $selection ?></th>
                            </tr>
                            </tfoot>
                            <tbody>
                            <?php require_once __DIR__ . '/beneficiaires/allBeneficiairesTournee.php'; ?>
                            </tbody>
                        </table>
                    </div>
                    <input type="submit" class="btn btn-success" value="<?= $beneficiaries_validate ?>">
                </form>

                <div class="table-responsive" id="displayProducts">
                    <table class="table table-bordered" id="dataTable">
                        <thead>
                        <tr>
                            <th><?= $barcode ?></th>
                            <th><?= $name ?></th>
                            <th><?= $quantity ?></th>
                            <th><?= $dlc ?></th>
                            <th><?= $stock ?></th>
                            <th><?= $selection ?></th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th><?= $barcode ?></th>
                            <th><?= $name ?></th>
                            <th><?= $quantity ?></th>
                            <th><?= $dlc ?></th>
                            <th><?= $stock ?></th>
                            <th><?= $selection ?></th>
                        </tr>
                        </tfoot>
                        <tbody id="productsTable">

                        </tbody>
                    </table>
                    <button class="btn btn-primary" id="validateBenef"><?= $delivery_validate ?></button>
                </div>

                <div id="EndGenerate">
                    <button class="btn btn-info" onclick="finish()"><?= $back_menu ?></button>
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

        <!-- Page custom Javascript-->
        <script src="tournees/tourneeGenerateView.js"></script>

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