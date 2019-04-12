<?php

require_once(__DIR__.'/../models/article.php');

// a real simple service that return a unique article
//it's used for the C program

$barcode = htmlspecialchars($_GET["barcode"]);
$Article = new Article($barcode);
$Article->displayInfo();
