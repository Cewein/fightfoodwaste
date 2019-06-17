<?php

require_once __DIR__ . "/../../includes.php";
require_once ('gathering.php');
require_once __DIR__ . "/../UpdateButtons.php";


$lastFood = getOldStateFoodCollection();
//var_dump($inComing);


if (isset($lastFood)) {
    $alreadyTaken = [];

    if (count($lastFood) > 0) {
        for ($i = 0; $i < count($lastFood); $i++) {


            $alreadyTaken[$i] = new gathering(

                $lastFood[$i]['identifiant'],
                $lastFood[$i]['date_collecte'],
                $lastFood[$i]['status']

            );
        }

        // $idCollection = 0;
        foreach ($alreadyTaken as $alreadyTake) {
            $defaultRow = "<tr id=\"" . $alreadyTake->getIdGat() . " \"><th scope=\"row\">" . $alreadyTake->getIdGat() . "</th>";
            $defaultRow .= "<td>" . $alreadyTake->getDate() . "</td>";
            $defaultRow .= "<td>" . $alreadyTake->getStatus() . "</td>";
            $defaultRow .= "</tr>";

            // $idCollection++;

            echo $defaultRow;
        }
    } else {
        echo "Il n'y a eu aucune collecte jusqu'à présent.";
    }
}
