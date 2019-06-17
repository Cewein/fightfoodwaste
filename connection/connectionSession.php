<?php

function setUsersSession($id,$name,$email,$roles,$pname=''){
    $_SESSION['id']=$id;
    $_SESSION['name']=$name;
    $_SESSION['pname']=$pname;
    $_SESSION['email']=$email;
    $_SESSION['roles']=$roles;
}