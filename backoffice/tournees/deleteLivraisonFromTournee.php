<?php

require_once __DIR__ . '/../../includes.php';

if(isset($_POST['idLivraison'])===true){
    $livraison=$_POST['idLivraison'];
    setLivraisonEtat($livraison,'canceled');

    //unset produit.id_livraison=NULL
    $productsLivraison=getProductByLivraisonId($livraison);
    if(empty($productsLivraison)!==true){
        foreach ($productsLivraison as $product){
            updateProductSetLivraison('NULL',$livraison);
        }
    }
}

