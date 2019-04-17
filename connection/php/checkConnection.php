<?php
/**
 * Created by Rebecca.
 * User: Rebecca
 * Date: 08/04/2019
 * Time: 23:01
 */

require_once __DIR__.'/../../includes.php';

//verification de l'envoi du form
if (isset($_POST['connexionForm'])) {
  if(isset($_POST['adresseMail']) AND isset($_POST['password'])) {
    if (!empty($adresseMail) and !empty($password)) {
    $adresseMail = htmlspecialchars($_POST['adresseMail']);

    $checkConnect = true;

    $password = password_hash(htmlspecialchars($_POST['password']), PASSWORD_DEFAULT);
      if ($password === false) {
      $verif = false;
      }
      //analyse des données reçues et retour
      $resultLogin = getConnection($request, [$mail, $pwd]);
      if ($resultLogin !== [$mail, $pwd]) {
        $errorLogin = "Adresse mail ou mot de passe incorrects!";
        $checkConnect = false; 
      }

      if($checkConnect == true) {
        getConnection($mail, $pwd);
        $session = setUsersSession($id,$name,$email,$type,$admin); 

      } else {
        http_response_code(400);
        echo ("Erreur lors de la connexion");
      }
    }

    } else {
      $errorLogin = "Merci de compléter tous les champs de ce formulaire !";
    }
}


 /*
    if (!empty($adresseMail) and !empty($password)) {
        $requser = $conn->prepare( "SELECT * FROM `utilisateur` WHERE `adresse_mail` = ? AND `motdepasse` = ?");
        $requser->execute(array($adresseMail, $password));
        $userexist = $requser->rowCount();
        if ($userexist == 1) {
           $userinfo = $requser->fetch();
            $_SESSION['id'] = $userinfo['id'];
            $_SESSION['nom'] = $userinfo['nom'];
            $_SESSION['prenom'] = $userinfo['prenom'];
            header("Location: index.php?id=" . $_SESSION['id']); 
        }  else {
            $erreur = "Mauvais mail ou mot de passe !";
        }
    } else {
        $erreur = "Tous les champs doivent être complétés !";
    } 
}*/

/*
    //Email unicity check
    $result = getUserIdByMail($email);
    if ($result !== []) {
      $error = "mail already set";
      $verif = false;
    }

    if ($verif === true) {
      set_particulier($name, $pname, $email, $password, $adress, $city, $state);
      setRole($email, 'particulier');

      echo "Variables set";
    } else {
      http_response_code(400);
      if (isset($error) === true) {
        echo $error;
      } else {
        echo ("Error : Verification Error");
      }
    }
  } else {
    echo "Error : Variables not set";
  }
} elseif (isset($_POST['commercant']) === true) {
  if (isset($_POST['name']) === true && isset($_POST['Siret']) === true && isset($_POST['email']) === true && isset($_POST['pwd']) === true && isset($_POST['adress']) === true && isset($_POST['city']) === true) {
    $nameShop = htmlspecialchars($_POST['name']);
    $SIRET = htmlspecialchars($_POST['Siret']);
    $email = htmlspecialchars($_POST['email']);
    $adress = htmlspecialchars($_POST['adress']);
    $city = htmlspecialchars($_POST['city']);

    $state = 1;
    $verif = true;

    //Password hash
    $password = password_hash(htmlspecialchars($_POST['pwd']), PASSWORD_DEFAULT);
    if ($password === false) {
      $verif = false;
    }

    //Email unicity check
    $result = getUserIdByMail($email);
    if ($result !== [0]) {
      $verif = false;
    }

    if ($verif === true) {
      set_commercant($nameShop, $SIRET, $email, $password, $adress, $city, $state);
      setRole($email, 'commercant');
    } else {
      http_response_code(400);
      echo ("Error : Verification Error");
    }
  } else {
    echo "Error : Variables not set";
  }
} elseif (isset($_POST['salary']) === true) {
  if (isset($_POST['nom']) === true && isset($_POST['prenom']) === true && isset($_POST['email']) === true && isset($_POST['pwd']) === true && isset($_POST['adresse']) === true && isset($_POST['ville']) === true) {
    $name = htmlspecialchars($_POST['nom']);
    $pname = htmlspecialchars($_POST['prenom']);
    $email = htmlspecialchars($_POST['email']);
    $adress = htmlspecialchars($_POST['adresse']);
    $city = htmlspecialchars($_POST['ville']);

    $state = 1;
    $verif = true;
    //Password hash
    $password = password_hash(htmlspecialchars($_POST['pwd']), PASSWORD_DEFAULT);
    if ($password === false) {
      $verif = false;
    }

    //Email unicity check
    $result = getUserIdByMail($email);
    if ($result !== []) {
      $error = "mail already set";
      $verif = false;
    }

    if ($verif === true) {
      set_particulier($name, $pname, $email, $password, $adress, $city, $state);
      setRole($email, 'salary');

      echo "Variables set";
    } else {
      http_response_code(400);
      if (isset($error) === true) {
        echo $error;
      } else {
        echo ("Error : Verification Error");
      }
    }
  } else {
    echo "Error : Variables not set";
  }
}


function setRole($mail, $roleToSet)
{
  $idUser = getUserIdByMail($mail);
  $idRole = getRoleId($roleToSet);

  setRoleUser($idUser['identifiant'], $idRole['identifiant']);
}


// Création de la session
	session_start();
	$_SESSION['prenom']=$_POST['prenom'];
	$_SESSION['nom']=$_POST['nom'];
	//Redirection
	header("Location:index.php");//page d'accueil???
	exit;
*/