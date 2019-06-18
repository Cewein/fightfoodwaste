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


    <title>Administration : Stock</title>

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
                <h1 class="h3 mb-2 text-gray-800"><?= $beneficiaries_management ?></h1>
                <p class="mb-4">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#addModal">
                        <?= $benef_add ?>
                    </button>
                </p>

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary" id="actualDisplay"><?= $list_benef ?></h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable">
                                <thead>
                                <tr>
                                    <th><?= $id ?></th>
                                    <th><?= $name ?></th>
                                    <th><?= $address ?></th>
                                    <th><?= $city ?></th>
                                    <th><?= $benef_Lat ?></th>
                                    <th><?= $benef_Long ?></th>
                                    <th><?= $typeofbeneficiary ?></th>
                                    <th><?= $actions ?></th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th><?= $id ?></th>
                                    <th><?= $name ?></th>
                                    <th><?= $address ?></th>
                                    <th><?= $city ?></th>
                                    <th><?= $benef_Lat ?></th>
                                    <th><?= $benef_Long ?></th>
                                    <th><?= $typeofbeneficiary ?></th>
                                    <th><?= $actions ?></th>
                                </tr>
                                </tfoot>
                                <tbody>
                                <?php require_once __DIR__ . '/beneficiaires/allBeneficiaires.php'; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->

            <!-- Modal -->
            <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog .modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="ModalLabel"><?= $benef_add ?></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" id="modal-body">
                            <form method="POST" id="add_beneficiaire">
                                <div class="form-group">
                                    <label for="inputNom"><?= $benef_name ?></label>
                                    <input type="text" class="form-control" id="inputNom"
                                           aria-describedby="nom"
                                           placeholder="<?= $benef_name ?>">
                                    <small id="nameError" class="form-text text-muted">14 caractères nécessaires</small>
                                </div>
                                <div class="form-group">
                                    <label for="inputAdress"><?= $benef_adr ?></label>
                                    <input type="text" class="form-control" id="inputAdress"
                                           aria-describedby="adresse"
                                           placeholder="<?= $benef_adr ?>">
                                    <small id="adressError" class="form-text text-muted">Adresse erronée</small>
                                </div>
                                <div class="form-group">
                                    <label for="inputCity"><?= $benef_city ?></label>
                                    <input type="text" class="form-control" id="inputCity"
                                           aria-describedby="ville"
                                           placeholder="<?= $benef_city ?>">
                                    <small id="cityError" class="form-text text-muted">Ville trop éloignée</small>
                                </div>
                                <div class="form-group">
                                    <label for="inputLat"><?= $benef_coord ?></label>
                                    <input type="text" class="form-control" id="inputLat"
                                           placeholder="<?= $benef_Lat ?>">
                                    <small id="LatError" class="form-text text-muted">Décimale a .8</small>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="inputLong"
                                           placeholder="<?= $benef_Long ?>">
                                    <small id="LongError" class="form-text text-muted">Décimale a .8</small>
                                </div>
                                <div class="form-group">
                                    <label for="inputType"><?= $benef_type ?></label>
                                    <input type="text" class="form-control" id="inputType"
                                           placeholder="<?= $benef_type ?>">
                                    <small id="stockError" class="form-text text-muted">Entre 0 et 10</small>
                                </div>
                                <button type="submit" class="btn btn-primary"><?= $validate ?></button>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"
                                    onclick="reloadModal()"><?= $close ?>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog .modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="ModalLabelUpdate"><?= $benef_modify ?></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" id="modal-body">
                            <form method="POST" id="modify_beneficiaire">
                                <div class="form-group">
                                    <label for="modifyNom"><?= $benef_name ?></label>
                                    <input type="text" class="form-control" id="modifyNom"
                                           aria-describedby="nom"
                                           placeholder="<?= $benef_name ?>">
                                    <small id="modifyNameError" class="form-text text-muted">14 caractères nécessaires</small>
                                </div>
                                <div class="form-group">
                                    <label for="modifyAdress"><?= $benef_adr ?></label>
                                    <input type="text" class="form-control" id="modifyAdress"
                                           aria-describedby="adresse"
                                           placeholder="<?= $benef_adr ?>">
                                    <small id="modifyAdressError" class="form-text text-muted">Adresse erronée</small>
                                </div>
                                <div class="form-group">
                                    <label for="modifyCity"><?= $benef_city ?></label>
                                    <input type="text" class="form-control" id="modifyCity"
                                           aria-describedby="ville"
                                           placeholder="<?= $benef_city ?>">
                                    <small id="modifyCityError" class="form-text text-muted">Ville trop éloignée</small>
                                </div>
                                <div class="form-group">
                                    <label for="modifyLat"><?= $benef_coord ?></label>
                                    <input type="text" class="form-control" id="modifyLat"
                                           placeholder="<?= $benef_Lat ?>">
                                    <small id="modifyLatError" class="form-text text-muted">Décimale a .8</small>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="modifyLong"
                                           placeholder="<?= $benef_Long ?>">
                                    <small id="modifyLongError" class="form-text text-muted">Décimale a .8</small>
                                </div>
                                <div class="form-group">
                                    <label for="inputType"><?= $benef_type ?></label>
                                    <input type="text" class="form-control" id="modifyType"
                                           placeholder="<?= $benef_type ?>">
                                    <small id="typeError" class="form-text text-muted">Entre 0 et 10</small>
                                </div>
                                <input type="hidden" class="form-control" id="beneficiaireId" value="">
                                <button type="submit" class="btn btn-primary"><?= $validate ?></button>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"
                                    onclick="reloadModal()"><?= $close ?>
                            </button>
                        </div>
                    </div>
                </div>
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

<!-- Script to display users-->
<script src="beneficiaires/beneficiaireTable.js"></script>

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