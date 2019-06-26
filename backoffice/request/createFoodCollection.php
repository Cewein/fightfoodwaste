<?php   

include_once __DIR__ . "../../../includes.php";

if(isset($_POST['submit'])) {
    $insertCollection = setFoodCollection(); 
 
   
    $lastId = selectLastIdCollection();

    $updateWonderTable = updateStatedWonder(); 
} 

header('Location: /../displayUsers.php');