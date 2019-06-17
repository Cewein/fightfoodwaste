<?php

require_once __DIR__ . '/../../includes.php';
require_once __DIR__ . '/../../stock/models/article.php';

$today = date('Y-m-d');
$allProducts = getAllProductsDLC($today);

$number = 0;
foreach ($allProducts as $product) {

    $article = new Article($product['code_barre']);
    $article->setDLC($product['DLC']);

    $buttons = buttons($product['identifiant'], $number);

    $row = "<tr id=" . $number . "><th scope=\"row\">" . $product['code_barre'] . "</th>";
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
    $buttonUpdate = "<button class=\"btn fas fa-hammer\" onclick='updateProduct($id," . $num . ")' data-toggle=\"modal\" data-target=\"#updateModal\"></button>";
    $buttons = $buttonUpdate . " " . $buttonDelete;
    return $buttons;
}
