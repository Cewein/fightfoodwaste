<?php
/**
 * Created by PhpStorm.
 * User: Sandrine
 * Date: 18/05/2019
 * Time: 17:21
 */

function addProduct($barcode, $quantity, $DLC, $stock,$idUser){
    $db = DatabaseManager::getManager();

    $request = "INSERT INTO `produit`(code_barre,quantite,DLC,n_stock,id_utilisateur) VALUES (?,?,?,?,?)";
    $db->exec($request, [$barcode, $quantity, $DLC, $stock,$idUser]);
}

function updateProductbyId($id,$barcode, $quantity, $DLC, $stock){
    $db = DatabaseManager::getManager();

    $request = "UPDATE `produit` SET `code_barre`= ?, `quantite`=?, `DLC`=? , `n_stock`=? WHERE `identifiant`=?";
    $db->exec($request, [$barcode, $quantity, $DLC, $stock,$id]);
}