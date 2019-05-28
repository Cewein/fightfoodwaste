<?php
/**
 * Created by PhpStorm.
 * User: Sandrine
 * Date: 03/05/2019
 * Time: 15:34
 */

require_once __DIR__ . "/../../includes.php";

if (isset($_POST['newStatut']) === true && isset($_POST['idDemande']) === true) {
    setRequestStatut($_POST['idDemande'], $_POST['newStatut']);
    setInteraction($_SESSION['id'], $_POST['idDemande'], $_POST['newStatut']);
    echo "Statut changé ! Vous pouvez fermer le modal";
}