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

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

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
                <h1 class="h3 mb-2 text-gray-800">Gestion du stock</h1>
                <p class="mb-4">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#addModal">
                        Ajouter un produit
                    </button>
                </p>

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary" id="actualDisplay">Contenu du Stock</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" >
                                <thead>
                                <tr>
                                    <th>Code barre</th>
                                    <th>Nom</th>
                                    <th>Description</th>
                                    <th>Quantite</th>
                                    <th>DLC</th>
                                    <th>Stock</th>
                                    <th>ID demande</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>Code barre</th>
                                    <th>Nom</th>
                                    <th>Description</th>
                                    <th>Quantite</th>
                                    <th>DLC</th>
                                    <th>Stock</th>
                                    <th>ID demande</th>
                                    <th>Actions</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                <?php require_once __DIR__ . '/stock/allStock.php'; ?>
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
                            <h5 class="modal-title" id="ModalLabel">Ajouter un produit</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" id="modal-body">
                            <form method="POST" id="add_product">
                                <div class="form-group">
                                    <label for="inputBarcode">Code Barre</label>
                                    <input type="text" class="form-control" id="inputBarcode"
                                           aria-describedby="code-barre"
                                           placeholder="Code Barre">
                                    <small id="barcodeError" class="form-text text-muted">14 caractères nécessaires</small>
                                </div>
                                <div class="form-group">
                                    <label for="inputQuantity">Quantité</label>
                                    <input type="text" class="form-control" id="inputQuantity"
                                           aria-describedby="quantite"
                                           placeholder="Quantité">
                                    <small id="quantityError" class="form-text text-muted">Nombre entier</small>
                                </div>
                                <div class="form-group">
                                    <label for="inputDLC">Date Limite de Consommation</label>
                                    <input type="date" class="form-control" id="inputDLC"
                                           aria-describedby="emailHelp"
                                           placeholder="">
                                    <small id="DLCError" class="form-text text-muted">Date déjà passée</small>
                                </div>
                                <div class="form-group">
                                    <label for="inputNStock">Stock</label>
                                    <input type="text" class="form-control" id="inputNStock" placeholder="Stock">
                                    <small id="stockError" class="form-text text-muted">Entre 0 et 10</small>
                                </div>
                                <button type="submit" class="btn btn-primary">Valider</button>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="reloadModal()">Close</button>
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
                            <h5 class="modal-title" id="ModalLabelUpdate">Modifier un produit</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" id="modal-body">
                            <form method="POST" id="update_product">
                                <div class="form-group">
                                    <label for="modifBarcode">Code Barre</label>
                                    <input type="text" class="form-control" id="modifBarcode"
                                           aria-describedby="code-barre"
                                           placeholder="Code Barre">
                                    <small id="barcodeError" class="form-text text-muted">14 caractères nécessaires</small>
                                </div>
                                <div class="form-group">
                                    <label for="modifQuantity">Quantité</label>
                                    <input type="text" class="form-control" id="modifQuantity"
                                           aria-describedby="quantite"
                                           placeholder="Quantité">
                                    <small id="quantityError" class="form-text text-muted">Nombre entier</small>
                                </div>
                                <div class="form-group">
                                    <label for="modifDLC">Date limite de consommation</label>
                                    <input type="date" class="form-control" id="modifDLC"
                                           aria-describedby="emailHelp"
                                           placeholder="">
                                    <small id="DLCError" class="form-text text-muted">Date déjà passée</small>
                                </div>
                                <div class="form-group">
                                    <label for="modifNStock">Stock</label>
                                    <input type="text" class="form-control" id="modifNStock" placeholder="Stock">
                                    <small id="stockError" class="form-text text-muted">Entre 0 et 10</small>
                                </div>
                                <input type="hidden" class="form-control" id="productId" value="">
                                <button type="submit" class="btn btn-primary">Valider</button>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; FightFoodWaste 2019</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

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
<script src="stock/updateProduct.js"></script>

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