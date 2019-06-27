<?php
/**
 * Created by PhpStorm.
 * User: Sandrine
 * Date: 15/05/2019
 * Time: 15:30
 */
?>

<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../index.php">
        <div class="sidebar-brand-icon">
            <img src="../pictures/Logo_fight_food_waste.png" id="logo">
        </div>
        <div class="sidebar-brand-text mx-3">Fight Food Waste</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="BackHome.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span><?= $backoffhome ?></span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        <?= $categ_1 ?>
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
           aria-controls="collapseTwo">
            <i class="fas fa-address-card"></i>
            <span><?= $users ?></span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header"><?= $actions ?></h6>
                <a class="collapse-item" href="usersTableView_v2.php"><?= $disp_user ?></a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true"
           aria-controls="collapseThree">
            <i class="fas fa-box-open"></i>
            <span><?= $stock ?></span>
        </a>
        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header"><?= $actions ?></h6>
                <a class="collapse-item" href="allStockView_v2.php"><?= $disp_stock ?></a>
                <a class="collapse-item" href="demandesView_v2.php"><?= $request_management ?></a>
            </div>
        </div>
    </li>

    <div class="sidebar-heading">
        <?= $categ_2 ?>
    </div>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
           aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span><?= $tournees ?> </span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header"><?= $tournees ?></h6>
                <a class="collapse-item" href="tourneeHome.php"><?= $tournee_management ?></a>
                <a class="collapse-item" href="tourneeDisplay.php?type=preparation"><?= $prev_tournee ?></a>
                <a class="collapse-item" href="tourneeDisplay.php?type=ready"><?= $prep_tournee ?></a>
                <a class="collapse-item" href="tourneeDisplay.php?type=done"><?= $realized_tournee ?></a>
                <a class="collapse-item" href="beneficiairesView.php"><?= $beneficiaries_list ?></a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true"
           aria-controls="collapseFour">
            <i class="fas fa-fw fa-wrench"></i>
            <span><?= $collecte ?></span>
        </a>
        <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header"><?= $collecte ?></h6>
                <a class="collapse-item" href="foodCollectionHome.php"><?= $collect_management ?></a>
                <a class="collapse-item" href="activFoodCollection.php"><?= $disp_prev_collect ?></a>
                <a class="collapse-item" href="pastFoodCollection.php"><?= $disp_past_collect ?></a>
                <a class="collapse-item" href="displayUsers.php"><?= $valid_req_list ?></a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->