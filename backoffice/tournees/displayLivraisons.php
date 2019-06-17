<?php

require_once __DIR__ . "/../../includes.php";

$allTournees = getTourneeEtatPreparation();
$lastid = -1;
foreach ($allTournees as $tournee) {
    if ($tournee['n_tournee'] !== $lastid) {
        $livraisons = getAddressesLivraisonByIdTournee($tournee['n_tournee']);

        $row = "<div class='dropdown'>
                    <br>
                    <button class='btn btn-dark dropdown-toggle' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                        " . $livraisons[0]['date_livraison'] . " -- Tournée n°" . $tournee['n_tournee'] . "
                    </button>
                  <div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>";

        foreach ($livraisons as $livraison) {
            $produits = getProductByLivraisonId($livraison['identifiant_livraison']);
            $row .= "<form method='POST' action='tournees/createPDF.php'>
                        <input type='hidden' name='idLivraison' value='" . $livraison['identifiant_livraison'] . "'>
                        
                        <input type='hidden' name='beneficiaire' value='" . $livraison['nom'] . "'>
                        <input type='hidden' name='idBeneficiaire' value='" . $livraison['id_beneficiaire'] . "'>
                        
                        <input type='hidden' name='adress' value='" . $livraison['adresse'] . "'>
                        <input type='hidden' name='city' value='" . $livraison['ville'] . "'>
                        <input type='hidden' name='dateLivraison' value='" . $livraison['date_livraison'] . "'>";

            $i = 0;
            foreach ($produits as $produit) {
                $row .= "<input type='hidden' name='" . $i . "' value='" . $produit['identifiant'] . "," . $produit['code_barre'] . "," . $produit['quantite'] . "'>";
                $i++;
            }

            $row .= "   <input type='submit' name='adresse' value='Livraison n°" . $livraison['identifiant_livraison'] . "' class='dropdown-item'>

                    </form>";

        }

        $row .= "    </div>
                </div>";

        echo $row;
    }

    $lastid = $tournee['n_tournee'];
}
