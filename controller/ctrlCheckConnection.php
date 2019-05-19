<?php
	$champs=array('adresse_mail','password');

	echo $_POST['adresse_mail'].'<br>'; 

	/*foreach ($champs as $value) {
		if(!isset($_POST[$value]) || empty($_POST[$value])) {
			header("Location:.php?error=".$value);
			exit;
		} else {
			echo "ok"; 
		}
	}
/*
	// Ecriture du log
	$log=fopen("log.txt", "r+");
	fseek($log, 0, SEEK_END);
	fputs($log,$_POST['pseudo']."\n");  */

	$req = $bdd->prepare('SELECT identifiant, nom, prenom, adresse_mail, admin FROM UTILISATEURS WHERE adresse_mail=:adresse_mail AND password=:password');
	$req->execute(array(
	  "adresse_mail" =>htmlspecialchars($_POST['adresse_mail']),
	  "password" => chiffrer($_POST['password']),
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
    $_SESSION["id"] = $arrayUsers[0]["identifiant"];
    $_SESSION["username"] = $arrayUsers[0]["username"];
    $_SESSION["lastname"] = $arrayUsers[0]["lastname"];
    $_SESSION["gender"] = $arrayUsers[0]["gender"];
    $_SESSION["admin"] = $arrayUsers[0]["admin"];
    header('Location: index.php');
    exit;
    }


	// Création de la session
	session_start();
	$_SESSION['nom']=$_POST['nom'];
	$_SESSION['prenom']=$_POST['prenom'];


/*	//Redirection
	header("Location:index.php");
	exit;
?>
