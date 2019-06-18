<?php 


require_once  ('../includes.php'); 

if(isset($_SESSION['id']) && isset($etat_compte)) {
    $id = $_SESSION['id']; 
    $etat_compte = '1'; 
    $sleepUser = inactivateUser($id,$atat_compte); 
    var_dump($sleepUser); 


}