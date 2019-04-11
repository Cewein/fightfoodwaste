<?php
/**
 * Created by Rebecca.
 * User: Rebecca
 * Date: 08/04/2019
 * Time: 23:01
 */

require_once __DIR__.'/../includes.php';
require_once __DIR__.'/../database/database.php';

$fieldsConnection=array('email','pwd');

	foreach ($champs as $value) {
		if(!isset($_POST[$value]) || empty($_POST[$value])){
			header("Location:index.php?error=".$value); //page d'accueil???
			exit;
		} else {
			echo 'Merci de remplir les champs de connexion<br>';  
		}
	}

    
$req=$database->prepare('SELECT identifiant, nom, prenom, adresse_mail, password, n_SIRET INTO UTILISATEUR WHERE adresse_mail=:email AND password=:pwd'); 

$req->execute(array(
  "email" =>htmlspecialchars($_POST['email']),
  "pwd" => chiffrer($_POST['pwd']),
));

$arrayUsers = array ();

while ($user = $req->fetch()) {
  $arrayUsers[] = $user;
}
$req->closeCursor();

  if (count($arrayUsers) == 0) {
    header('Location: index.php?error=motdepasseErrone');
    echo '<script type="text/javascript">window.alert("Le login ou mot de passe incorrect.");</script>';
    exit;
  } else if (count($arrayUsers) == 1) {
    session_start();
    $_SESSION["id"] = $arrayUsers[0]["id"];
    $_SESSION["prenom"] = $arrayUsers[0]["prenom"];
    $_SESSION["nom"] = $arrayUsers[0]["nom"];
    $_SESSION["right"] = $arrayUsers[0]["right"];//sous entendu le rôle 
    header('Location: index.php');//page d"accueuil??
    exit;
    }

  
		


// Création de la session
	session_start();
	$_SESSION['prenom']=$_POST['prenom'];
	$_SESSION['nom']=$_POST['nom'];
	//Redirection
	header("Location:index.php");//page d'accueil???
	exit;
