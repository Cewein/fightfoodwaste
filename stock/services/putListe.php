<?php

require_once(__DIR__.'/../manager/sendList.php');

$json = file_get_contents("php://input");
$tmp = new SendList($json);
echo $tmp->send();

