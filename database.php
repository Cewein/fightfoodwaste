<?php
/**
 * Created by PhpStorm.
 * User: Sandrine
 * Date: 26/03/2019
 * Time: 22:26
 */
function connection()
{
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=fight_food_waste;charset=utf8', 'root', '');
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    return $bdd;
}

