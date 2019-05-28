<?php



//Connexion à la base de données 
function databaseConnection() {
	 try
    {
        $db = new PDO('mysql:host=localhost;dbname=fight_food_waste;charset=utf8', 'root', '');
        return $db;
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
}

//echo "ok, test de redirection nickel!!";


$champs = array('adresseMailConnect','passwordConnect');

foreach ($champs as $value) {
  if(!isset($_POST[$value]) || empty($_POST[$value]))
  {
    header("Location: ../view/frontend/connection.html?error=".$value);
    exit;
  } else {
 	
  }
}


//require('../controller/ctrlCheckConnection.php'); 





?>