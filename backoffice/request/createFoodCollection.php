<?php   

include_once __DIR__ . "../../../includes.php";

if(isset($_POST['submit'])) {
    $insertCollection = setFoodCollection(); 
 
   
    $lastId = selectLastIdCollection();


    $updateWonderTable = updateStatedWonder(); 
} 

header('Location: http://vps664303.ovh.net/backoffice/displayUsers.php');

