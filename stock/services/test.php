<?php

require_once(__DIR__.'/../models/list.php');

$a = new Article(3029330003533);
$b = new Article(5449000133328);

$list = new ArticleList();

$list->add($a);
$list->add($b);

$list->show();