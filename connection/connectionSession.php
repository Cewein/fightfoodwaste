<?php
/**
 * Created by PhpStorm.
 * User: Sandrine
 * Date: 15/04/2019
 * Time: 17:10
 */

function setUsersSession($id,$name,$email,$roles){
    $_SESSION['id']=$id;
    $_SESSION['name']=$name;
    $_SESSION['email']=$email;
    $_SESSION['roles']=$roles;
}