<?php

require_once __DIR__ . "/../../includes.php";
require_once ('tour.php');



$validatedWonder = getRequestsByStatut('checkedTrue');


if (isset($validatedWonder)) {
    $userInfos = getAllValidatedWonder();
}

$contacts = [];

if (count($userInfos) > 0) {
    for ($i = 0; $i < count($userInfos); $i++) {


        $contacts[$i] = new tour(

            $userInfos[$i]['id_demande'],
            $userInfos[$i]['nom'],
            $userInfos[$i]['prenom'],
            $userInfos[$i]['adresse'],
            $userInfos[$i]['ville']
        );
    }

    foreach ($contacts as $contact) {
        ob_start(); ?>

        <tr id=" <?= $contact->getIdWonder() ?>">
            <td>
                <div class="form-check">
                    <input class="form-check-input" name="checkbox[]" type="checkbox" value="" id="<?= $contact->getIdWonder() ?>" onclick="checkNbDemande()">
                </div>
            </td>
            <td class="font-weight-bold" name="idWonder" scope="row"> <?= $contact->getIdWonder() ?> </td>
            <td> <?= $contact->getLastName() ?> </td>
            <td> <?= $contact->getFirstName() ?> </td>
            <td> <?= $contact->getAddress() ?> </td>
            <td> <?= $contact->getCity() ?> </td>

        </tr>
        <?php
        $defaultRow = ob_get_clean();
        echo $defaultRow;
    }
}
