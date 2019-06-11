<?php

require_once __DIR__ . "/../includes.php";
require_once __DIR__ . "/foodCollection/validatedRequestList.php";
?>

    <!DOCTYPE html>
    <html lang="fr">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">


        <title>Administration : Gestion des collectes</title>

        <!-- Custom fonts for this template -->
        <link href="../css/BackOffice/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
              rel="stylesheet">

        <!-- Icons Link -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
              integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf"
              crossorigin="anonymous">

        <!-- Custom styles for this template -->
        <link href="../css/BackOffice/sb-admin-2.min.css" rel="stylesheet">

        <!-- Custom styles for this page -->
        <link href="../css/BackOffice/dataTables.bootstrap4.min.css" rel="stylesheet">
        <link href="../css/newHeader.css" rel="stylesheet">

    </head>

    <body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">


        <!-- Nav Item - Pages Collapse Menu -->
        <?php include('navbar.php'); ?>

        <!-- End of Sidebar -->

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
                                <img class="img-profile rounded-circle"
                                     src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
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
                    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
                    <p class="mb-4">Introduction au tableau</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <a href="#" onclick="usersRequests('checkedTrue');">
                                <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>Demande_id</th>
                                        <th>Id de l'utilisateur</th>
                                        <th>Nom</th>
                                        <th>Prénom</th>
                                        <th>Adresse</th>
                                        <th>Ville</th>
                                    </tr>
                                    </thead>

                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

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


<?php


//step 1 : afficher les demandes validées 
$requestsStatut = getAllValidatedWonder();
var_dump($requestsStatut);

//step 2 : afficher l'identifiant de l'utilisateur qui a fait la demande validée
$userValidate = getUserId();
var_dump($userValidate);
/*
    if (isset($_GET['idDemande'])) {
        if($_GET['idDemande'] == 'checkedTrue') {
        var_dump($userValidate); 
        }
        
    }*/


$test = getAllReferentUsers();
var_dump($test);


/*$i = 0;
$idRequestList = "";

foreach ($requestsStatut as $singleRequest) {
    $requests[$i] = new Request($singleRequest['identifiant'], $singleRequest['statut'], $singleRequest['id_collecte']);
    $idRequestList .= $requests[$i]->getId();
    if (isset($requestsStatut[$i + 1]) === true) {
        $idRequestList .= ",";
    }
    $i++;
}

    if (isset($requests)) {
    echo ('ok pour la condition'); 
     $idDemande = $_POST['demande'];
    $allProduct = getProductsByDemandeId($idDemande);


/*  $allUsersId = getUserId($idDemande);
    echo $allUsersId; 

   $validatedWonder = $_POST['statut'];
    $allValidatedWonder = getAllValidatedWonder($statut); */

/* echo "ouf";

} else {
  echo "not ok";
  var_dump($requests);
}

/*
  if(isset($_POST['demande'])) {
      echo('ok pour la condition');
     $requestsStatut = getRequestsByStatut($_POST['type']);


      echo ('ok');

      if(isset($idDemande)) {

      }


  $row = "Aucune demande n\'a été validée";

  foreach($allUser as $user) {
      $viewLine = new Tour ($id,
                           $fName,
                           $lName,
                           $siren,
                           $addr,
                           $city,
                           $idTour)
                          ;

      $row = "<tr><th scope=\"row\">" . $viewLine->getUserId(). "</th>";
      $row .= "<td>" . $viewLine->getLastName() . "</td>";
      $row .= "<td>" .  $viewLine->geTfirstName() . "</td>";
      $row .= "<td>" .  $viewLine->getSirenNumber() . "</td>";
      $row .= "<td>" .  $viewLine->getAddress() . "</td>";
      $row .= "<td>" .  $viewLine->getCity() . "</td>";
      $row .= "<td>" .  $viewLine->getIdTour() . "</td>";

      $row .= "</tr>";
  }
  echo $row;


}



/*

if( isset($_POST['type'])) {
  $requestsStatut = getRequestsByStatut($_POST['type']);
  echo ('ok');
}
$i = 0;
$idRequestList = "";

foreach ($requestsStatut as $singleRequest) {
  $requests[$i] = new Request($singleRequest['identifiant'], $singleRequest['statut'], $singleRequest['id_collecte']);
  $idRequestList .= $requests[$i]->getId();
  if (isset($requestsStatut[$i + 1]) === true) {
      $idRequestList .= ",";
  }
  $i++;
}
echo $idRequestList;

/*
  $name = $_POST['name'];
  $pname = $_POST['pname'];
  $adress = $_POST['adresse'];
  $city = $_POST['city'];
  $userId = getAllReferentUsers($idDemande, $name, $pname, $adress, $city);


// echo $userId; */
/*
$requestsStatut = getRequestsByStatut($_POST['type']);

    if($requestsStatut == 'checkedTrue') {
        echo('ok'); 

        foreach ($requestsStatut as $requeststatut) {

                $row = "<tr><th scope=\"row\">" . $request -> getId() . "</th>";
                $row .= "<td>" . $request -> getCreator(). "</td>";
                $row .= "<td>" . $_POST['pname'] . "</td>";
                $row .= "<td>" . $_POST['adress'] . "</td>";
                $row .= "<td>" . $_POST['city'] . "</td>";
                $row .= "</tr>";
        //   }

           
        }
        echo $row;

    } else {
        echo "Aucune demande n'a été validée";
    }
    */
