<?php
/**
 * Created by PhpStorm.
 * User: Sandrine
 * Date: 08/04/2019
 * Time: 15:59
 */
require_once __DIR__.'/../includes.php';

$allUsers=getAllUsers();
$allRoles=getAllRoles();

foreach($allUsers as $user){
    print_r($user);
    echo "<br>";
}