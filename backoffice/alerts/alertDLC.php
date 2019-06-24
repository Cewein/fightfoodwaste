<?php

require_once __DIR__ . '/../../includes.php';
require_once __DIR__ . '/../../stock/models/article.php';

$today = date('Y-m-d');
$allProducts = getAllProductsDLC($today);

$number = 0;
foreach ($allProducts as $product) {

    $article = new Article($product['code_barre']);
    $article->setDLC($product['DLC']);
    $article->setId($product['identifiant']);

    $buttons = buttons($product['identifiant'], $number);

    $row = "<tr id=" . $number . "><th scope=\"row\">" . $article->getId() . "</th>";
    $row .= "<td>" . $product['code_barre'] . "</td>";
    $row .= "<td>" . $article->getName() . "</td>";
    $row .= "<td>" . $product['DLC'] . "</td>";
    $row .= "<td>" . $buttons . "</td>";

    $row .= "</tr>";

    echo $row;

    $number++;
}

function buttons($id, $num)
{
    $buttonDelete = "<button class=\"btn fas fa-times\" onclick='deleteProduct($id," . $num . ")' ></button>";
    return $buttonDelete;
}
