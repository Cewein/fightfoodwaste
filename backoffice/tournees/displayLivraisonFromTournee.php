<?php

require_once __DIR__ . '/../../includes.php';

//Récupérer les livraisons liées a une tournee
if (isset($_POST['idTournee']) === true) {
    $allLivraison = getLivraisonByIdTournee($_POST['idTournee']);

    foreach ($allLivraison as $livraison) {
        $buttons = buttons($livraison['identifiant_livraison'], $livraison['etat']);
        $row = "<tr id=" . $livraison['identifiant_livraison'] . "><th scope=\"row\">" . $livraison['identifiant_livraison'] . "</th>";
        $row .= "<th>" . $livraison['id_beneficiaire'] . "</th>";
        $row .= "<th>" . $livraison['etat'] . "</th>";
        $row .= "<th>" . $buttons . "</th>";
        $row .= "</tr>";

        echo $row;
    }
}

function buttons($idLivraison, $etat)
{
    if ($etat === 'preparation') {
        $buttons = "<button class=\"btn fas fa-check-square\" onclick=\"setEtatLivraison(" . $idLivraison . ", 'ready')\" ></button>";//Ready
        $buttons .= "<button class=\"btn fas fa-truck-moving\" onclick=\"setEtatLivraison(" . $idLivraison . ", 'done')\" ></button>";//Done
    } elseif ($etat === 'ready') {
        $buttons = "<button class=\"btn fas fa-parking\" onclick=\"setEtatLivraison(" . $idLivraison . ", 'preparation')\" ></button>";//Preparation
        $buttons .= "<button class=\"btn fas fa-truck-moving\" onclick=\"setEtatLivraison(" . $idLivraison . ", 'done')\" ></button>";//Done
    } elseif ($etat === 'done') {
        $buttons = "<button class=\"btn fas fa-parking\" onclick=\"setEtatLivraison(" . $idLivraison . ", 'preparation')\" ></button>";//Preparation
        $buttons .= "<button class=\"btn fas fa-check-square\" onclick=\"setEtatLivraison(" . $idLivraison . ", 'ready')\" ></button>";//Ready
    }

    $buttons .= "<button class=\"btn fas fa-ban\" onclick=\"modal(" . $idLivraison . ")\" data-toggle=\"modal\" data-target=\"#cancelConfirmation\"></button>";//Done

    return $buttons;
}