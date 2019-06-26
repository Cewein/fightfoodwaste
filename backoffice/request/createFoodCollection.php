<?php   

include_once __DIR__ . "../../../includes.php";

if(isset($_POST['submit'])) {
    $insertCollection = setFoodCollection(); 
 
   
    $lastId = selectLastIdCollection();
    var_dump($lastId);

    $updateWonderTable = updateStatedWonder($insertCollection,$identifiant); 
    var_dump($updateWonderTable);  
   
} 