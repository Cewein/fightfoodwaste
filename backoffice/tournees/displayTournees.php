<?php

require_once __DIR__ . "/../../includes.php";

if (isset($type) === true) {
    if ($type === 'preparation') {
        $etat = 'preparation';
    } elseif ($type === 'ready') {
        $etat = 'ready';
    } elseif ($type === 'done') {
        $etat = 'done';
    }

    if (isset($etat) === true) {
        $allLivraisons = getAllLivraisonByEtat($etat);

        foreach ($allLivraisons as $livraison) {

            $idTournee = $livraison['n_tournee'];
            $dateTournee = $livraison['date_livraison'];

            $allTournees[$idTournee]['n_tournee'] = $idTournee;
            $allTournees[$idTournee]['date'] = $dateTournee;

            if (isset($allTournees[$idTournee]['etat']) === true) {
                //Si l'état déjà marqué dans le tableau des tournées est plus avancé que l'état de l'une des livraisons,
                //On rétrograde l'état des tournées pour coller à l'état le plus bas
                if ($allTournees[$idTournee]['etat'] === 'done' && ($livraison['n_tournee'] === 'ready' || $livraison['n_tournee'] === 'preparation')) {
                    $allTournees[$idTournee]['etat'] = $livraison['n_tournee'];
                } elseif ($allTournees[$idTournee]['etat'] === 'ready' && $livraison['n_tournee'] === 'preparation') {
                    $allTournees[$idTournee]['etat'] = $livraison['n_tournee'];
                }
            } else {
                $allTournees[$idTournee]['etat'] = $livraison['etat'];
            }
        }

        if (empty($allTournees) !== true) {
            foreach ($allTournees as $tournee) {

                $buttons = buttons($tournee['n_tournee']);
                $row = "<tr id=" . $tournee['n_tournee'] . "><th scope=\"row\">" . $tournee['n_tournee'] . "</th>";
                $row .= "<th>" . $tournee['etat'] . "</th>";
                $row .= "<th>" . $tournee['date'] . "</th>";
                $row .= "<th>" . $buttons . "</th>";
                $row .= "</tr>";

                echo $row;
            }
        }
    }
} else {
    $allTournees = getTourneeEtatPreparation();
    $lastid = -1;
    foreach ($allTournees as $tournee) {
        if ($tournee['n_tournee'] !== $lastid) {
            $row = "<button type='button' class='list-group-item list-group-item-action' > Tournée " . $tournee['n_tournee'] . "</button>";

            echo $row;
        }
        $lastid = $tournee['n_tournee'];
    }
}

function buttons($idTournee)
{
    $buttonDelete = "<button class=\"btn fas fa-times\" onclick='deleteTournee(" . $idTournee . ")' ></button>";
    $buttonDisplay = "<button class=\"btn fas fa-list-ul\" onclick='displayLivraisons(" . $idTournee . ")' data-toggle=\"modal\" data-target=\"#LivraisonsModal\"></button>";
    $buttons = $buttonDisplay . " " . $buttonDelete;
    return $buttons;
}

