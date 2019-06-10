<?php

require_once __DIR__ . "/../../includes.php";

$allTournees = getTourneeEtatPreparation();
$lastid = -1;
foreach ($allTournees as $tournee) {
    if ($tournee['n_tournee'] !== $lastid) {
        $livraisons = getAddressesLivraisonByIdTournee($tournee['n_tournee']);

        $row = "<div class='dropdown'>
                    <button class='btn btn-dark dropdown-toggle' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                        Tournee n°" . $tournee['n_tournee'] . "
                    </button>
                  <div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>";

        foreach ($livraisons as $livraison) {
            $row .= "<button class='dropdown-item' onclick='loadPDF(" . $livraison['identifiant'] . ", '" . $livraison['nom'] . "', '" . $livraison['date_livraison'] . "')'> Livraison n° " . $livraison['identifiant'] . " </button>";
        }

        $row .= "    </div>
                </div>";

        echo $row;
    }

    $lastid = $tournee['n_tournee'];
}
