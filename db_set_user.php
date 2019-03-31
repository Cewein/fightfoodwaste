<?php
/**
 * Created by PhpStorm.
 * User: Sandrine
 * Date: 26/03/2019
 * Time: 23:04
 */

require_once "database.php";

function set_particulier($name,$mail){
    $bdd=connection();

    $request=$bdd->prepare("INSERT INTO `utilisateur`(nom,adresse_mail) VALUES (:nom,:mail)");
    $request->execute(array(
        'nom'=>$name,
        'mail'=>$mail
    ));

}