<?php
/**
 * Created by PhpStorm.
 * User: Sandrine
 * Date: 14/05/2019
 * Time: 15:56
 */
require_once __DIR__. "/../includes.php";
?>

<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">


    <title>Administration : Utilisateurs</title>

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

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <!-- Topbar Search -->
                <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                               aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

                    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                    <li class="nav-item dropdown no-arrow d-sm-none">
                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-search fa-fw"></i>
                        </a>
                        <!-- Dropdown - Messages -->
                        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                             aria-labelledby="searchDropdown">
                            <form class="form-inline mr-auto w-100 navbar-search">
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-0 small"
                                           placeholder="Search for..." aria-label="Search"
                                           aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </li>

                    <div class="topbar-divider d-none d-sm-block"></div>

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">Valerie Luna</span>
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
                                Logout
                            </a>
                        </div>
                    </li>

                </ul>

            </nav>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <h1 class="h3 mb-2 text-gray-800">Utilisateurs</h1>
                <p class="mb-4"><!--Navbar Infos Users -->
                <div class="btn-group btn-group-toggle" id="buttonsUsers" data-toggle="buttons">
                    <input class="btn btn-secondary" type="button" value="Afficher tous les utilisateurs" onclick="allUsers()">
                    <input class="btn btn-secondary" type="button" value="Afficher particuliers" onclick="users('particulier')">
                    <input class="btn btn-secondary" type="button" value="Afficher commercants" onclick="users('commercant')">
                    <input class="btn btn-secondary" type="button" value="Afficher salariés" onclick="users('salary')">
                </div>

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#addModal">
                    Inscrire un utilisateur
                </button>

                </p>

                <!-- Users table -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary" id="actualDisplay">Tous les utilisateurs</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th id="userName">Nom</th>
                                    <th id="pname">Prenom</th>
                                    <th>Adresse Email</th>
                                    <th>Adresse</th>
                                    <th>Ville</th>
                                    <th>Role(s)</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th id="userNameBot">Nom</th>
                                    <th id="pnameBot">Prenom</th>
                                    <th>Adresse Email</th>
                                    <th>Adresse</th>
                                    <th>Ville</th>
                                    <th>Role(s)</th>
                                    <th>Actions</th>
                                </tr>
                                </tfoot>
                                <tbody id="tbody">
                                <?php require_once __DIR__.'/users/allUsers.php'; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->

            <!-- Modal Add User -->
            <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog .modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ajouter un utilisateur</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" id="add_user">
                                <label id="emailSetError">Cette adresse email est déjà utilisée</label>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Type utilisateur</label>
                                    <select class="form-control" id="typeUser">
                                        <option>Particulier</option>
                                        <option>Commerçant</option>
                                        <option>Salarié</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="InputNom">Nom</label>
                                    <input type="text" class="form-control" id="inputName" aria-describedby="nom"
                                           placeholder="Nom / Nom commerce">
                                    <small id="nameError" class="form-text text-muted">Contient 1-100 caractères</small>
                                </div>
                                <div class="form-group">
                                    <label for="InputNom">Prénom (non obligatoire pour les commerçants)</label>
                                    <input type="text" class="form-control" id="inputPname" aria-describedby="prenom"
                                           placeholder="Prenom">
                                    <small id="pnameError" class="form-text text-muted">Contient 1-100 caractères</small>
                                </div>
                                <div class="form-group">
                                    <label for="InputEmail1">Adresse Email</label>
                                    <input type="email" class="form-control" id="inputEmail" aria-describedby="emailHelp"
                                           placeholder="Enter email">
                                    <small id="emailError" class="form-text text-muted">Contient 1-100 caractères</small>
                                </div>
                                <div class="form-group">
                                    <label for="InputPassword1">Password</label>
                                    <input type="password" class="form-control" id="inputPwd" placeholder="Password">
                                    <small id="pwdError" class="form-text text-muted">Contient 1-100 caractères</small>
                                </div>
                                <div class="form-group">
                                    <label for="InputNom">Adresse</label>
                                    <input type="text" class="form-control" id="inputAdress" aria-describedby="adress"
                                           placeholder="Adresse">
                                </div>
                                <div class="form-group">
                                    <label for="InputNom">Ville</label>
                                    <input type="text" class="form-control" id="inputCity" aria-describedby="city"
                                           placeholder="Ville">
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Modify User -->
            <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog .modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ajouter un utilisateur</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" id="update_user">
                                <label id="emailSetError">Cette adresse email est déjà utilisée</label>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Type utilisateur</label>
                                    <select class="form-control" id="modiftypeUser">
                                        <option>Particulier</option>
                                        <option>Commerçant</option>
                                        <option>Salarié</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="InputNom">Nom</label>
                                    <input type="text" class="form-control" id="modifName" aria-describedby="nom"
                                           placeholder="Nom / Nom commerce">
                                    <small id="nameError" class="form-text text-muted">Contient 1-100 caractères</small>
                                </div>
                                <div class="form-group">
                                    <label for="InputNom">Prénom (non obligatoire pour les commerçants)</label>
                                    <input type="text" class="form-control" id="modifPname" aria-describedby="prenom"
                                           placeholder="Prenom">
                                    <small id="pnameError" class="form-text text-muted">Contient 1-100 caractères</small>
                                </div>
                                <div class="form-group">
                                    <label for="InputEmail1">Adresse Email</label>
                                    <input type="email" class="form-control" id="modifEmail" aria-describedby="emailHelp"
                                           placeholder="Enter email">
                                    <small id="emailError" class="form-text text-muted">Contient 1-100 caractères</small>
                                </div>
                                <div class="form-group">
                                    <label for="InputNom">Adresse</label>
                                    <input type="text" class="form-control" id="modifAdress" aria-describedby="adress"
                                           placeholder="Adresse">
                                </div>
                                <div class="form-group">
                                    <label for="InputNom">Ville</label>
                                    <input type="text" class="form-control" id="modifCity" aria-describedby="city"
                                           placeholder="Ville">
                                </div>
                                <input type="hidden" id="userId" value="">
                                <button type="submit" class="btn btn-primary">Submit</button>
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

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="login.html">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Script to display users-->
<script src="users/usersTable.js"></script>

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

