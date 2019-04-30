<?php
require_once __DIR__ . '/../../includes.php';
require_once __DIR__ . '/../../stock/models/article.php';

$allProduct = getAllProduct();
$allDemande = getAllDemande();

$number = 0;
foreach ($allProduct as $product) {

    $article = new Article($product['code_barre']);

    $buttons=buttons($product['identifiant'],$number);

    $row = "<tr id=".$number."><th scope=\"row\">" . $product['code_barre'] . "</th>";
    $row .= "<td>" . $article->getName() . "</td>";
    $row .= "<td>" . $article->getDescription() . "</td>";
    $row .= "<td>" . $product['id_demande'] . "</td>";
    $row .= "<td>" .$product['DLC']. "</td>";
    $row .= "<td>" .$buttons. "</td>";
    $row .= "</tr>";

    echo $row;

    $number++;
}

function buttons($id, $num){
    $buttonDelete = "<button class=\"btn fas fa-times\" onclick='deleteProduct($id,".$num.")'></button>";
    $buttonUpdate = "<button class=\"btn fas fa-hammer\" onclick='updateUser($id)'></button>";
    $buttons = $buttonUpdate . " " . $buttonDelete;
    return $buttons;
}
?>