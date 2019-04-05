<?php
/**
 * Created by PhpStorm.
 * User: Sandrine
 * Date: 04/04/2019
 * Time: 11:01
 */

require_once __DIR__.'/../includes.php';
$nom=htmlspecialchars($_POST['nom']);
$prenom=htmlspecialchars($_POST['prenom']);
$email=htmlspecialchars($_POST['email']);
set_particulier($nom,$prenom,$email);
if(isset($_POST['particulier'])){
    if(isset($_POST['nom'])===true&&isset($_POST['prenom'])===true&&isset($_POST['email'])===true&&isset($_POST['password'])===true&&isset($_POST['adresse'])===true&&isset($_POST['ville'])===true){ //Si toutes les variables sont set

        $nom=htmlspecialchars($_POST['nom']);
        $prenom=htmlspecialchars($_POST['prenom']);
        $email=htmlspecialchars($_POST['email']);
        //$password=htmlspecialchars($_POST['pwd']);
        //$adresse=htmlspecialchars($_POST['adresse']);
        //$ville=htmlspecialchars($_POST['ville']);

        $verif=true;

        if($verif===true){
            set_particulier($nom,$prenom,$email);

        }
        else{
            http_response_code(400);
        }
    }
    else{
        echo "Error : Variables not set";
    }

}
elseif (isset($_POST['commerçant'])===true){
      if(isset($_POST['email'])===true&&isset($_POST['password'])===true&&isset($_POST['adresse'])===true&&isset($_POST['ville'])===true){
          $email=htmlspecialchars($_POST['email']);
          $password=htmlspecialchars($_POST['pwd']);
          $adresse=htmlspecialchars($_POST['adresse']);
          $ville=htmlspecialchars($_POST['ville']);

          if($verif===true){
            //set_commercant($nom,$prenom,$email);

        }
        else{
            echo ("Error : Verification Error");
        }
    }
    else{
        echo "Error : Variables not set";
    }
}







print_r($_POST);
