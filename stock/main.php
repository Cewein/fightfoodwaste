<?php

require_once(__DIR__.'./article.php');

$barcode = htmlspecialchars($_GET["barcode"]);

$crystal = new Article($barcode);
$crystal->displayInfo();

$nathAFaux = new Barcode($barcode);
//var_dump($nathAFaux->getJson());