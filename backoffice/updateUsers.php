<?php
/**
 * Created by PhpStorm.
 * User: Sandrine
 * Date: 14/04/2019
 * Time: 19:19
 */
require_once __DIR__ . '/../includes.php';

//$_POST['type']='delete';
//$_POST['id']=;

if(isset($_POST['type'])===true&&isset($_POST['id'])===true){
    $type=$_POST['type'];
    var_dump($type);
    $id=$_POST['id'];
    if($type=='delete'){
        $role=getRoleByUserId($id);
        if(count($role)>0){
            deleteRoleByIdUserId($role['id_role'],$id);
        }

        deleteUser($id);
        echo 'User deleted';
    }
    else{
        echo 'Error type';
    }

}
else{
    echo "Missing Value";
}