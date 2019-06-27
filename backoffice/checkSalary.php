<?php

$isAuthorized=false;
$isAdmin=false;
if(isset($_SESSION['roles'])===true){
    $allRoles=getAllRoles();

    foreach ($_SESSION['roles'] as $role){
        //get all roles to have the name
        foreach ($allRoles as $uniqueRole) {
            if (isset($role) === true && $role === $uniqueRole['identifiant']) {
                $roleName = $uniqueRole['nom'];
            }
        }

        if ($roleName==='salary'){
            $isAuthorized=true;
        }
        elseif ($roleName==='administrateur'){
            $isAuthorized=true;
            $isAdmin=true;
        }
    }

    if($isAuthorized===false){
        header('Location: ../front/index.php');
        exit;
    }
}
else{
    header('Location: ../front/index.php');
    exit;
}