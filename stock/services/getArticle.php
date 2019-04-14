<?php

require_once(__DIR__.'/../models/article.php');

// a real simple service that return a unique article
//it's used for the C program

if(isset($_GET["barcode"]))
{
    $Article = new Article(htmlspecialchars($_GET["barcode"]));
    $Article->displayInfo();
}
else
{
    http_response_code(400);
}