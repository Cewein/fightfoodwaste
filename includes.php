<?php

session_start();

//Set the language
if (isset($_GET['lang']) === true) {
    if ($_GET['lang'] === 'fr') {
        setcookie("eng", 1, time() - 4200);
        setcookie("fr", 1, time() + (((3600 * 24) * 30) * 12));
    } elseif ($_GET['lang'] === 'eng') {
        setcookie("fr", 1, time() - 4200);
        setcookie("eng", 1, time() + (((3600 * 24) * 30) * 12));
    }
}
if (isset($_COOKIE['eng']) === true) {
    require_once __DIR__ . '/lang/eng.php';
} else {
    require_once __DIR__ . '/lang/fr.php';
}

//Get th connection
require_once __DIR__ . '/database/database.php';

//Get all db requests
/* Users Requests */
require_once __DIR__ . '/database/request/db_set_user.php';
require_once __DIR__ . '/database/request/dbGetUser.php';
require_once __DIR__ . '/database/request/dbRoles.php';
require_once __DIR__ . '/database/request/dbUpdateUser.php';

/*Stock Requests*/
require_once __DIR__ . '/database/request/dbGetStock.php';
require_once __DIR__ . '/database/request/dbUpdateProducts.php';
require_once __DIR__ . '/database/request/dbUsersRequests.php';

/*Users Requests Requests (yeah it's a normal name !)*/
require_once __DIR__ . '/database/request/dbInteractions.php';

/*Beneficaires Requests */
require_once __DIR__ . "/database/request/dbBeneficiaires.php";

/*Tournees Requests */
require_once __DIR__ . "/database/request/dbTournee.php";

require_once __DIR__ . '/database/request/dbGetConnection.php';

//Get other functions
require_once __DIR__ . '/connection/connectionSession.php';

//Get users'adress for foodCollection
require_once __DIR__ . '/database/request/dbGetUsersAddress.php';
