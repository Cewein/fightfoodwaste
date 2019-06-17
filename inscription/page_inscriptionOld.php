<?php
/**
 * Created by PhpStorm.
 * User: Sandrine
 * Date: 02/04/2019
 * Time: 15:59
 */

require_once __DIR__ . '/../includes.php';
$actualDirectory=__DIR__;
?>

<!DOCTYPE html>

<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <link href="../css/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/header.css" rel="stylesheet">
        <link href="../css/general.css" rel="stylesheet">
        <link href="../css/inscription.css" rel="stylesheet">
        <title>Inscription</title>
    </head>

    <body>
       <?php require_once __DIR__ . '/../header/adaptHeader.php'; ?>

       <div class="content">
            <div>
                <p>En vous inscrivant, vous avez la possibilité de participer a nos collectes et donc de limiter le gaspillage alimentaire en plus de venir en aide à des personnes qui en ont besoin.</p>
                <p>Deux types d'inscriptions sont donc disponibles, soit en tant que particulier soit en tant que commerçant.</p>
            </div>

           <div><h2>Inscription en tant que</h2></div>

           <div class="row">
               <button class="btn btn-secondary" onclick="visible('particulier')">Particulier</button>
               <button class="btn btn-info" onclick="visible('commercant')">Commerçant</button>
           </div>

           <div id="form_particulier">
               <p>En tant que particulier, vous disposerez d'un dispositif permettant de nous signaler que vous avez des produits à collecter.</p>
               <form method="POST" id="inscription">
                    <p id="emailSetError">Cette adresse email est déjà utilisée</p>
                   <div class="form-group">
                       <label for="nom">Nom</label>
                       <input type="text" class="form-control" id="input_name" name="nom" aria-describedby="Nom de famille" placeholder="Votre nom">
                       <small id="nameError" class="form-text text-muted">Contient 1-100 caractères</small>
                   </div>

                   <div class="form-group">
                       <label for="prenom">Prénom</label>
                       <input type="text" class="form-control" id="input_pname" name="prenom" aria-describedby="Prenom" placeholder="Votre prénom">
                       <small id="PNameError" class="form-text text-muted">Contient 1-100 caractères</small>
                   </div>

                   <div class="form-group" id="email">
                       <label for="input_email">Adresse Email</label>
                       <input type="email" class="form-control" id="input_email_p" name="email" aria-describedby="Adresse Mail" placeholder="Votre adresse mail">
                       <small id="emailHelp" class="form-text text-muted">Votre adresse mail ne sera transmise a personne.</small>
                       <small id="emailError" class="form-text text-muted">Contient 3-80 caractères</small>
                   </div>

                   <div class="form-group">
                       <label for="input_password1">Entrez votre mot de passe</label>
                       <input type="password" class="form-control" id="input_password_p1" name="pwd" placeholder="Password">
                       <small id="pwd1Error" class="form-text text-muted">Contient 8-50 caractères</small>
                   </div>
                   <div class="form-group">
                       <label for="input_password1">Confirmez votre mot de passe</label>
                       <input type="password" class="form-control" id="input_password_p2" placeholder="Password">
                       <small id="pwd2Error" class="form-text text-muted">Les mots de passe doivent être identiques</small>
                   </div>

                   <div class="form-group">
                       <label for="input_adresse">Adresse</label>
                       <input type="text" class="form-control" id="input_adresse_p" name="adresse" placeholder="Adresse">
                   </div>

                   <div class="form-group">
                       <label for="input_ville">Ville</label>
                       <input type="text" class="form-control" id="input_ville_p" name="ville" placeholder="Ville">
                   </div>
                   <input type="hidden" name="type_inscription" value="particulier">
                   <button type="submit" class="btn btn-primary">Valider</button>
               </form>
           </div>

           <div id="form_commercant">
               <p>En tant que commerçant, nous viendrons collecter vos produit avec un rythme d'une fois par semaine. Vous aurez la possibilité de nous signaler si vous n'avez rien a collecter afin de gagner du temps.</p>
               <form method="POST" id="inscription_shop">
                   <div class="form-group">
                       <label for="inputNameShop">Nom du commerce</label>
                       <input type="text" class="form-control" id="inputNameShop" name="nameShop" placeholder="Nom du commerce">
                       <small id="nameShopError" class="form-text text-muted">Contient 2-100 caractères</small>
                   </div>
                   <div class="form-group">
                       <label for="inputSiret">Numero de SIRET</label>
                       <input type="text" class="form-control" id="inputSiret" name="name_shop" placeholder="Numero de SIRET">
                       <small id="SIRETError" class="form-text text-muted">Contient 11 chiffres</small>
                   </div>
                   <div class="form-group">
                       <label for="input_email">Adresse Email</label>
                       <input type="email" class="form-control" id="inputEmailC" name="email" aria-describedby="Adresse Mail" placeholder="Votre adresse mail">
                       <small id="emailHelp" class="form-text text-muted">Votre adresse mail ne sera transmise a personne.</small>
                   </div>
                   <div class="form-group">
                       <label for="inputPwd1">Entrez votre mot de passe</label>
                       <input type="password" class="form-control" id="inputPwdC1" name="pwd" placeholder="Password">
                       <small id="pwd1Error" class="form-text text-muted">Contient 8-50 caractères</small>
                   </div>
                   <div class="form-group">
                       <label for="inputPwd2">Vérifiez votre mot de passe</label>
                       <input type="password" class="form-control" id="inputPwdC2" placeholder="Password">
                       <small id="pwd2Error" class="form-text text-muted">Les mots de passe doivent être identiques</small>
                   </div>
                   <div class="form-group">
                       <label for="inputAdresse">Adresse</label>
                       <input type="text" class="form-control" id="inputAdressC" name="adresse" placeholder="Adresse">
                   </div>
                   <div class="form-group">
                       <label for="inputVille">Ville</label>
                       <input type="text" class="form-control" id="inputCityC" name="ville" placeholder="Ville">
                   </div>
                   <button type="submit" class="btn btn-primary">Valider</button>
               </form>
           </div>
       </div>
        <footer></footer>
        <script src="inscription.js"></script>
        <script src="page_inscription.js"></script>
    </body>

  

</html>