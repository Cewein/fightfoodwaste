<?php

require_once __DIR__ . "/../../includes.php";
require_once __DIR__ . "/beneficiaire.php";
require_once __DIR__ . "/../UpdateButtons.php";

$allBeneficiaires = getAllBeneficiaires();

$i = 0;
if (count($allBeneficiaires) > 0) {
    foreach ($allBeneficiaires as $singleBeneficiaire) {
        $beneficiaires[$i] = new beneficiaire($singleBeneficiaire['identifiant'], $singleBeneficiaire['nom'],
            $singleBeneficiaire['adresse'], $singleBeneficiaire['ville'], $singleBeneficiaire['type_beneficiaire']);
        $i++;
    }

    foreach ($beneficiaires as $beneficiaire) {

        $row = "<tr id=\"" . $beneficiaire->getId() . " \"><th scope=\"row\">" . $beneficiaire->getId() . "</th>";
        $row .= "<td>" . $beneficiaire->getName() . "</td>";
        $row .= "<td>" . $beneficiaire->getAdress() . "</td>";
        $row .= "<td>" . $beneficiaire->getCity() . "</td>";
        $row .= "<td>" . $beneficiaire->getType() . "</td>";

        $row .= "<td> <input type='checkbox' class='inputBeneficiaire' value='".$beneficiaire->getId()."'> </td>";
        $row .= "</tr>";
        echo $row;

    }
}
