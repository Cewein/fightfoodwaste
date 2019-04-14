<?php

require_once(__DIR__.'/../manager/sendList.php');

$json = file_get_contents("php://input");
var_dump($json)
$tmp = new SendList($json);
echo $tmp->send();

