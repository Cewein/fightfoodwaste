<?php
/**
 * Created by PhpStorm.
 * User: Sandrine
 * Date: 18/05/2019
 * Time: 17:02
 */

require_once __DIR__ . '/../../includes.php';

$check=true;

if(isset($_POST['barcode'])===true && isset($_POST['quantity'])===true && isset($_POST['DLC'])===true && isset($_POST['stock'])===true){
    $barcode=htmlspecialchars($_POST['barcode']);
    $quantity=htmlspecialchars($_POST['quantity']);
    $DLC=htmlspecialchars($_POST['DLC']);
    $stock=htmlspecialchars($_POST['stock']);
}
else{
    $check=false;
}

if($check===true){
    addProduct($barcode,$quantity,$DLC,$stock,$_SESSION['id']);
}
else{
    echo 'Error : missing Value';
}

