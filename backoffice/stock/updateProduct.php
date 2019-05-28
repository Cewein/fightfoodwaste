<?php
/**
 * Created by PhpStorm.
 * User: Sandrine
 * Date: 14/04/2019
 * Time: 23:46
 */

require_once __DIR__ . '/../../includes.php';


if (isset($_POST['type']) === true && isset($_POST['id']) === true) {
    $type = $_POST['type'];
    $id = $_POST['id'];

    if ($type === 'delete') {

        deleteProductById($id);

        echo 'Product deleted';

    } elseif ($type === 'update') {
        $barcode = $_POST['barcode'];
        $quantity = $_POST['quantity'];
        $DLC = $_POST['DLC'];
        $stock = $_POST['stock'];

        updateProductbyId($id, $barcode, $quantity, $DLC, $stock);
        echo 'Product updated';
    } else {
        echo "Error: there's no roles";
    }

} else {
    echo "Missing Value";
}