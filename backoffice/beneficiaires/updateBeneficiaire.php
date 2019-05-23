<?php
/**
 * Created by PhpStorm.
 * User: Sandrine
 * Date: 23/05/2019
 * Time: 14:24
 */

require_once __DIR__ . '/../../includes.php';

if(isset($_POST['id'])===true && isset($_POST['action'])===true){
    $id=$_POST['id'];
    $action=$_POST['action'];

    if($action==='delete'){
        deleteBeneficiaireById($id);
        echo "Beneficiaire deleted";
    }
    else{
        echo "No action defined";
    }
}