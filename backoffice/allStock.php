<?php
require_once __DIR__ . '/../includes.php';
require_once __DIR__ . '/../stock/models/article.php';

$allProduct = getAllProduct();
$allDemande = getAllDemande();


foreach ($allProduct as $product) {

    $article = new Article($product['code_barre']);

    $buttons=buttons($product['identifiant']);

    $row = "<tr><th scope=\"row\">" . $product['code_barre'] . "</th>";
    $row .= "<td>" . $article->getName() . "</td>";
    $row .= "<td>" . $article->getDescription() . "</td>";
    $row .= "<td>" . $product['id_demande'] . "</td>";
    $row .= "<td>" .$product['DLC']. "</td>";
    $row .= "<td>" .$buttons. "</td>";
    $row .= "</tr>";

    echo $row;
}

function buttons($id){
    $buttonDelete = "<button class=\"btn fas fa-times\" onclick='deleteProduct($id)'></button>";
    $buttonUpdate = "<button class=\"btn fas fa-hammer\" onclick='updateUser($id)'></button>";
    $buttons = $buttonUpdate . " " . $buttonDelete;
    return $buttons;
}
?>