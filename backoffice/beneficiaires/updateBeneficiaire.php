<?php
/**
 * Created by PhpStorm.
 * User: Sandrine
 * Date: 23/05/2019
 * Time: 14:24
 */

require_once __DIR__ . '/../../includes.php';

if (isset($_POST['id']) === true && isset($_POST['action']) === true) {
    $id = $_POST['id'];
    $action = $_POST['action'];

    if ($action === 'delete') {
        deleteBeneficiaireById($id);
        echo "Beneficiaire deleted";
    } elseif ($action === 'update') {
        if (isset($_POST['nom']) === true && isset($_POST['adress']) === true && isset($_POST['city']) === true && isset($_POST['lat']) === true && isset($_POST['long']) === true && isset($_POST['type']) === true) {
            $name = $_POST['nom'];
            $adress = $_POST['adress'];
            $city = $_POST['city'];
            $lat = $_POST['lat'];
            $long = $_POST['long'];
            $type = $_POST['type'];

            updateBeneficiaire($name, $adress, $city, $lat, $long, $type, $id);
            echo "Beneficiaire updated";
        }

    } else {
        echo "No action defined";
    }
}