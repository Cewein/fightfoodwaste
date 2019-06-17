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
            <span>Back-office Home</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Catégorie 1
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
           aria-controls="collapseTwo">
            <i class="fas fa-address-card"></i>
            <span>Utilisateurs</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Actions :</h6>
                <a class="collapse-item" href="usersTableView_v2.php">Affichage des utilisateurs</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true"
           aria-controls="collapseThree">
            <i class="fas fa-box-open"></i>
            <span>Stock</span>
        </a>
        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Actions :</h6>
                <a class="collapse-item" href="allStockView_v2.php">Affichage du stock</a>
                <a class="collapse-item" href="demandesView_v2.php">Gestion des demandes</a>
            </div>
        </div>
    </li>

    <div class="sidebar-heading">
        Catégorie 2
    </div>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
           aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Tournées</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Tournées</h6>
                <a class="collapse-item" href="tourneeHome.php">Gérer les tournées</a>
                <a class="collapse-item" href="tourneeDisplay.php?type=preparation">Tournées prévues</a>
                <a class="collapse-item" href="tourneeDisplay.php?type=ready">Tournées préparées</a>
                <a class="collapse-item" href="tourneeDisplay.php?type=done">Tournées Réalisées</a>
                <a class="collapse-item" href="beneficiairesView.php">Liste des bénéficiaires</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true"
           aria-controls="collapseFour">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Collectes</span>
        </a>
        <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Collectes</h6>
                <a class="collapse-item" href="foodCollectionHome.php">Gérer les collectes</a>
                <a class="collapse-item" href="activFoodCollection.php">Afficher les collectes prévues</a>
                <a class="collapse-item" href="pastFoodCollection.php">Afficher les collectes passées</a>
                <a class="collapse-item" href="displayUsers.php">Liste des demandes validées</a>
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