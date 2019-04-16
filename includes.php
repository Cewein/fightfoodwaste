<?php
/**
 * Created by PhpStorm.
 * User: Sandrine
 * Date: 01/04/2019
 * Time: 14:38
 */

//Get th connection
require_once __DIR__.'/database/database.php';

//Get all db requests
require_once __DIR__ . '/database/request/db_set_user.php';
require_once __DIR__ . '/database/request/dbGetUser.php';
require_once __DIR__ . '/database/request/dbRoles.php';
require_once __DIR__ . '/database/request/dbGetStock.php';
require_once __DIR__ . '/database/request/dbDemande.php';


//<<<<<<< HEAD
require_once __DIR__ . '/database/request/dbUserConnection.php';
//=======
require_once __DIR__ . '/database/request/dbUpdateUser.php';

//>>>>>>> 26e029209bb0f1302bd6d6900bc2979ea0fcae8c

//Get other functions
require_once __DIR__ . '/connection/php/connectionSession.php';
