<?php

require_once __DIR__ . "/../../includes.php";
require_once ('gathering.php');
require_once __DIR__ . "/../UpdateButtons.php";


$inComing = getStateFoodCollection();
//var_dump($inComing);


if (isset($inComing)) {
    $foodCollections = [];

    if (count($inComing) > 0) {
        for ($i = 0; $i < count($inComing); $i++) {


            $foodCollections[$i] = new gathering(

                $inComing[$i]['identifiant'],
                $inComing[$i]['date_collecte'],
                $inComing[$i]['status']

            );
        }

        // $idCollection = 0;
        foreach ($foodCollections as $foodCollection) {
            $defaultRow = "<tr id=\"" . $foodCollection->getIdGat() . " \"><th scope=\"row\">" . $foodCollection->getIdGat() . "</th>";
            $defaultRow .= "<td>" . $foodCollection->getDate() . "</td>";
            $defaultRow .= "<td>" . $foodCollection->getStatus() . "</td>";
            $defaultRow .= "</tr>";

            // $idCollection++;

            echo $defaultRow;
        }
    } else {
        echo "Il n'y a aucune collecte de prévu pour le moment."; 
    }


}


