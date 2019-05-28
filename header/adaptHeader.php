<?php
/**
 * Created by PhpStorm.
 * User: Sandrine
 * Date: 17/04/2019
 * Time: 09:59
 */

require_once __DIR__ . '/../includes.php';

$path = explode('\\', $actualDirectory);

$pathEnd = $path[count($path) - 1];

if ($pathEnd !== DIR_HOME) {
    $directory = "../";
} else {
    $directory = "";
}

if ($pathEnd === 'backoffice') {
    require_once __DIR__ . '/headerBack.php';
} else {
    require_once __DIR__ . '/headerFront.php';
}