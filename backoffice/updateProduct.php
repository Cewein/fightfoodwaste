<?php
/**
 * Created by PhpStorm.
 * User: Sandrine
 * Date: 14/04/2019
 * Time: 23:46
 */

require_once __DIR__ . '/../includes.php';


if (isset($_POST['type']) === true && isset($_POST['id']) === true) {
    $type = $_POST['type'];
    $id = $_POST['id'];

    if ($type === 'delete') {

        deleteProductById($id);

        deleteUser($id);
        echo 'Product deleted';

    } else {
        echo "Error: there's no roles";
    }

} else {
    echo "Missing Value";
}