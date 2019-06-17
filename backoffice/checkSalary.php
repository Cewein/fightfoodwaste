<?php

$isAuthorized=false;
if(isset($_SESSION['roles'])===true){
    $allRoles=getAllRoles();

    foreach ($_SESSION['roles'] as $role){
        //get all roles to have the name
        foreach ($allRoles as $uniqueRole) {
            if (isset($role) === true && $role === $uniqueRole['identifiant']) {
                $roleName = $uniqueRole['nom'];
            }
        }

        if ($roleName==='salary' || $roleName==='administrateur'){
            $isAuthorized=true;
        }
    }

    if($isAuthorized===false){
        echo 'miam';
        header('Location: ../front/index.php');
        exit;
    }
}
else{
    echo 'miambis session kk';
    header('Location: ../front/index.php');
    exit;
}