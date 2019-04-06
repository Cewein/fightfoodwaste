<?php
/**
 * Created by PhpStorm.
 * User: Sandrine
 * Date: 02/04/2019
 * Time: 15:59
 */

require_once __DIR__ . '/../includes.php';

?>


<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8" />
        <link href="../css/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/header.css" rel="stylesheet">
        <link href="../css/general.css" rel="stylesheet">
        <link href="../css/inscription.css" rel="stylesheet">
        <title>Inscription</title>
    </head>

    <body>
       <?php require_once __DIR__ . '/../header.php'; ?>

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

           <div id="form_particulier" style="display: block">
               <p>En tant que particulier, vous disposerez un dispositif permettant de nous signaler que vous avez des produits à collecter.</p>
               <form method="POST" id="inscription">

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

                   <div class="form-group">
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
                       <label for="input_password1">Vérifiez votre mot de passe</label>
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

           <div id="form_commercant" style="display: none">
               <p>En tant que commerçant, nous viendrons collecter vos produit avec un rythme d'une fois par semaine. Vous aurez la possibilité de nous signaler si vous n'avez rien a collecter afin de gagner du temps.</p>
               <form>
                   <div class="form-group">
                       <label for="input_email">Adresse Email</label>
                       <input type="email" class="form-control" id="input_email_c" name="email" aria-describedby="Adresse Mail" placeholder="Votre adresse mail">
                       <small id="emailHelp" class="form-text text-muted">Votre adresse mail ne sera transmise a personne.</small>
                   </div>
                   <div class="form-group">
                       <label for="input_password1">Entrez votre mot de passe</label>
                       <input type="password" class="form-control" id="input_password_c1" name="pwd" placeholder="Password">
                   </div>
                   <div class="form-group">
                       <label for="input_password1">Vérifiez votre mot de passe</label>
                       <input type="password" class="form-control" id="input_password_c2" placeholder="Password">
                   </div>
                   <div class="form-group">
                       <label for="input_adresse">Adresse</label>
                       <input type="text" class="form-control" id="input_adresse_c" name="adresse" placeholder="Adresse">
                   </div>
                   <div class="form-group">
                       <label for="input_ville">Ville</label>
                       <input type="text" class="form-control" id="input_ville_c" name="ville" placeholder="Ville">
                   </div>
                   <button type="submit" class="btn btn-primary">Valider</button>
               </form>
           </div>
       </div>
        <footer></footer>
    </body>

    <script src="inscription.js"></script>
    <script src="page_inscription.js"></script>

</html>