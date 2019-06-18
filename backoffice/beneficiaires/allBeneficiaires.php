<?php
/**
 * Created by PhpStorm.
 * User: Sandrine
 * Date: 22/05/2019
 * Time: 22:54
 */
require_once __DIR__ . "/../../includes.php";
require_once __DIR__ . "/beneficiaire.php";
require_once __DIR__ . "/../UpdateButtons.php";

$allBeneficiaires = getAllBeneficiaires();

$i = 0;
if (count($allBeneficiaires) > 0) {
    foreach ($allBeneficiaires as $singleBeneficiaire) {
        $beneficiaires[$i] = new beneficiaire($singleBeneficiaire['identifiant'], $singleBeneficiaire['nom'],
            $singleBeneficiaire['adresse'], $singleBeneficiaire['ville'],$singleBeneficiaire['Latitude'],$singleBeneficiaire['Longitude'], $singleBeneficiaire['type_beneficiaire']);
        $i++;
    }

    foreach ($beneficiaires as $beneficiaire) {

        $row = "<tr id=\"" . $beneficiaire->getId() . "\"><th scope=\"row\">" . $beneficiaire->getId() . "</th>";
        $row .= "<td>" . $beneficiaire->getName() . "</td>";
        $row .= "<td>" . $beneficiaire->getAdress() . "</td>";
        $row .= "<td>" . $beneficiaire->getCity() . "</td>";
        $row .= "<td>" . $beneficiaire->getLat() . "</td>";
        $row .= "<td>" . $beneficiaire->getLong() . "</td>";
        $row .= "<td>" . $beneficiaire->getType() . "</td>";

        $row .= "<td>" . getBeneficiairesButtons($beneficiaire->getId()) . "</td>";
        $row .= "</tr>";
        echo $row;

    }
}
