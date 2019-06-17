<?php
require_once __DIR__ . '/../../includes.php';
require_once __DIR__ . '/../../stock/models/article.php';


if (isset($_POST['tournee']) === true) { //If function was called by tourneeView
    $tournee = true;
    //Check if products musn't be deliver || Vérifie si les produits ne doit pas être livré dans une tournée
    $allProduct = getAllProductsFree();
} else {
    $tournee = false;
    $allProduct = getAllProductStocked();
}

$allDemande = getAllRequests();

$number = 0;
foreach ($allProduct as $product) {

    $article = new Article($product['code_barre']);
    $article->setQuantity($product['quantite']);
    $article->setDLC($product['DLC']);

    $buttons = buttons($product['identifiant'], $number);

    $row = "<tr id=" . $number . "><th scope=\"row\">" . $product['code_barre'] . "</th>";
    $row .= "<td>" . $article->getName() . "</td>";
    if ($tournee !== true) {
        $row .= "<td>" . $article->getDescription() . "</td>";
    }
    $row .= "<td>" . $article->getQuantity() . "</td>";
    $row .= "<td>" . $product['DLC'] . "</td>";
    $row .= "<td>" . $product['n_stock'] . "</td>";
    if ($tournee !== true) {
        $row .= "<td>" . $product['id_demande'] . "</td>";
        $row .= "<td>" . $buttons . "</td>";
    }
    else{
        $row .= "<td>" . select($product['identifiant']) . "</td>";
    }
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

function select($id){
    $checkbox = "<input class=\"selectButton\" value='$id' type='checkbox'>";
    return $checkbox;
}
