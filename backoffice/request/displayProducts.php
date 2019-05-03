<?php
/**
 * Created by PhpStorm.
 * User: Sandrine
 * Date: 03/05/2019
 * Time: 08:33
 */

require_once __DIR__ . "/../../includes.php";
require_once __DIR__ . "/../../stock/models/article.php";

if(isset($_POST['demande']) === true) {
    $idDemande=$_POST['demande'];
    $allProduct = getProductsByDemandeId($idDemande);


    foreach ($allProduct as $product) {
        $article = new Article($product['code_barre']);

        $row = "<tr><th scope=\"row\">" . $product['code_barre'] . "</th>";
        $row .= "<td>" . $article->getName() . "</td>";
        $row .= "<td>" . $product['DLC'] . "</td>";
        $row .= "<td>" . $product['quantite'] . "</td>";
        $row .= "</tr>";

    }
    echo $row;
}

