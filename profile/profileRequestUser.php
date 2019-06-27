<?php
require_once('../includes.php');

if (isset($_SESSION['id']) && isset($_SESSION['roles']) == 'administrateur' || isset($_SESSION['roles']) == 'salary' || isset($_SESSION['roles']) == 'particulier') {
    $id = ($_SESSION['id']);
    $userInfo = readUser($id);
    ?>

    <head>
        <title>Page de profil administrateur</title>
        <meta charset="utf-8">
        <link href="../css/profileAdmin.css" rel="stylesheet">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet"
              id="bootstrap-css">
    </head>

    <body>
    <div align="center">


        <!------ Include the above in your HEAD tag ---------->

        <br><br>

        <div class="container">
            <div class="row">
                <div class="col-md-3 ">
                    <div class="list-group ">
                        <a href="../front/index.php" class="list-group-item list-group-item-action">Accueil - Front
                            office</a>
                        <a href="profileRequestUser.php" class="list-group-item list-group-item-action">Suivi des demandes</a>
                        <a href="#" class="list-group-item list-group-item-action">Services</a>
                        <a href="#" class="list-group-item list-group-item-action">Contact</a>


                    </div>
                </div>
                <div class="col-5">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable">
                                <thead>
                                <tr>
                                    <th><?= $id ?></th>
                                    <th><?= $status ?></th>
                                    <th><?= $idcollect ?></th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th><?= $id ?></th>
                                    <th><?= $status ?></th>
                                    <th><?= $idcollect ?></th>
                                </tr>
                                </tfoot>
                                <tbody id="tbody">
                                <?php require_once __DIR__ . '/allRequestsForUser.php'; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="deleteProfile.js"></script>
    </body>

    <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><?= $confirmDelete ?></h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal"><?= $cancel ?></button>
                    <a class="btn btn-primary" href="../connection/disconnection.php" onclick="inactivate(<?= $_SESSION['id'] ?>)"><?= $confirm ?></a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="../css/bootstrap/js/bootstrap.bundle.min.js"></script>

    <?php
} else {
    header('Location: ../connection/connection.php');
    exit();
}
?>