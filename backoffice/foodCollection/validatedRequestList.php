<?php

require_once __DIR__.'/../../includes.php';
require_once __DIR__.'/tour.php';


    $validatedWonder = getAllValidatedWonder();
    var_dump($validatedWonder);
    
    if(!empty($validatedWonder)) {
    $contacts = getAllReferentUsers();
    var_dump($contacts); 

    $defaultRow = "Il n'y a aucune collecte à effectuer (dans la boucle)";
    $idCollection = 0;
    if ($idCollection > 13) {
        foreach ($contacts as $contact => $value) {
            $defaultRow .= "<tr>";
            $defaultRow .= "<td>" . $userValidate->getAllValidatedWonder() . "</td>";
            $defaultRow .= "<td>" . $contacts['identifiant'] . "</td>";
            $defaultRow .= "<td>" . $contacts['nom'] . "</td>";
            $defaultRow .= "<td>" . $contacts['prenom'] . "</td>";
            $defaultRow .= "<td>" . $contacts['adresse'] . "</td>";
            $defaultRow .= "<td>" . $contacts['ville'] . "</td>";
            $defaultRow .= "</tr>";
            $idCollection++;
        }
        echo $defaultRow; 
    } else {
        foreach ($contacts as $contact => $value) {
            $defaultRow .= "<tr>";
            $defaultRow .= "<td>" . $userValidate->getAllValidatedWonder() . "</td>";
            $defaultRow .= "<td>" . $contacts['identifiant'] . "</td>";
            $defaultRow .= "<td>" . $contacts['nom'] . "</td>";
            $defaultRow .= "<td>" . $contacts['prenom'] . "</td>";
            $defaultRow .= "<td>" . $contacts['adresse'] . "</td>";
            $defaultRow .= "<td>" . $contacts['ville'] . "</td>";
            $defaultRow .= "</tr>";
            $idCollection++;
        }
    }
  
    } else {
        echo "Il n'y a aucune collecte à effectuer";
    }