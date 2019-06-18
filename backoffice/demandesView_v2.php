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


    <title>Administration : Demandes</title>

    <!-- Custom fonts for this template -->
    <link href="../css/BackOffice/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
          rel="stylesheet">

    <!-- Icons Link -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
          integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

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
                <h1 class="h3 mb-2 text-gray-800"><?= $user_request ?></h1>

                <!--Navbar Infos Users -->
                <div class="btn-group btn-group-toggle" id="buttonsUsers" data-toggle="buttons">
                    <input class="btn btn-secondary" type="button" value="<?= $all_request ?>"
                           onclick="allUsersRequests()">
                    <input class="btn btn-secondary" type="button" value="<?= $tb_valid_request ?>"
                           onclick="usersRequests('tocheck')">
                    <input class="btn btn-secondary" type="button" value="<?= $valid_request ?>"
                           onclick="usersRequests('checkedTrue')">
                    <input class="btn btn-secondary" type="button" value="<?= $refused_request ?>"
                           onclick="usersRequests('checkedFalse')">
                    <input class="btn btn-secondary" type="button" value="<?= $closed_request ?>"
                           onclick="usersRequests('done')">
                </div>


                <!-- Modal -->
                <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="ModalProduct"
                     aria-hidden="true">
                    <div class="modal-dialog .modal-dialog-centered" role="document">
                        <div class="modal-content" id="body">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"><?= $product_request ?></h5>
                                <h5 class="modal-title" id="demandeId"></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div id="modal-body"></div>
                                <div class="table">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th scope="col"><?= $barcode ?></th>
                                            <th scope="col"><?= $name ?></th>
                                            <th scope="col"><?= $dlc ?></th>
                                            <th scope="col"><?= $quantity ?></th>
                                        </tr>
                                        </thead>
                                        <tbody id="productBody">

                                        </tbody>
                                    </table>
                                </div>
                                <div>
                                    <button type="button" class="btn btn-success" id="buttonValidate"
                                            data-dismiss="modal"><?= $validate ?>
                                    </button>
                                    <button type="button" class="btn btn-danger" id="buttonRefuse" data-dismiss="modal">
                                        <?= $close ?>
                                    </button>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary" id="actualDisplay"><?= $all_request ?></h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable">
                                <thead>
                                <tr>
                                    <th><?= $id ?></th>
                                    <th><?= $creator ?></th>
                                    <th id="pname"><?= $status ?></th>
                                    <th><?= $idcollect ?></th>
                                    <th><?= $actions ?></th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th><?= $id ?></th>
                                    <th><?= $creator ?></th>
                                    <th id="pname"><?= $status ?></th>
                                    <th><?= $idcollect ?></th>
                                    <th><?= $actions ?></th>
                                </tr>
                                </tfoot>
                                <tbody id="tbody">
                                <?php require_once __DIR__ . '/request/allRequests.php'; ?>
                                </tbody>
                            </table>
                        </div>
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

<!-- Script to display requests-->
<script src="request/demandesView.js"></script>

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