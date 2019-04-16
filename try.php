<?php
/**
 * Created by PhpStorm.
 * User: Sandrine
 * Date: 07/04/2019
 * Time: 22:10
 */

require_once __DIR__."/includes.php";


setUsersSession(78,'Dupont','jean.dupont@testeur.fr','salary',null);

var_dump($_SESSION);
//header('Location: index.php')
?>
