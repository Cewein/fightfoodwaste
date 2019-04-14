<?php
require_once __DIR__ . '/../includes.php';
require_once __DIR__ . '/../stock/models/article.php';

$allProduct = getAllProduct();
$allDemande = getAllDemande();


foreach ($allProduct as $product) {

    $article = new Article($product['code_barre']);

    $row = "<tr><th scope=\"row\">" . $product['code_barre'] . "</th>";
    $row .= "<td>" . $article->getName() . "</td>";
    $row .= "<td>" . $article->getDescription() . "</td>";
    $row .= "<td>" . $product['id_demande'] . "</td>";
    $row .= "</tr>";

    echo $row;
}

?>