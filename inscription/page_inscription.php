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

           <div><h2>Inscription en tant que</h2></div>

           <div class="row">
               <button class="btn btn-secondary">Particulier</button>
               <button class="btn btn-info ">Commerçant</button>
           </div>

           <div>
               <form method="POST" id="inscription">
                   <div class="form-group">
                       <label for="nom">Nom</label>
                       <input type="text" class="form-control" id="input_nom" name="nom" aria-describedby="Nom de famille" placeholder="Votre nom">
                   </div>
                   <div class="form-group">
                       <label for="prenom">Prénom</label>
                       <input type="text" class="form-control" id="input_prenom" name="prenom" aria-describedby="Prenom" placeholder="Votre prénom">
                   </div>
                   <div class="form-group">
                       <label for="input_email">Adresse Email</label>
                       <input type="email" class="form-control" id="input_email_p" name="email" aria-describedby="Adresse Mail" placeholder="Votre adresse mail">
                       <small id="emailHelp" class="form-text text-muted">Votre adresse mail ne sera transmise a personne.</small>
                   </div>
                   <div class="form-group">
                       <label for="input_password1">Entrez votre mot de passe</label>
                       <input type="password" class="form-control" id="input_password_p1" name="pwd" placeholder="Password">
                   </div>
                   <div class="form-group">
                       <label for="input_password1">Vérifiez votre mot de passe</label>
                       <input type="password" class="form-control" id="input_password_p2" placeholder="Password">
                   </div>
                   <div class="form-group">
                       <label for="input_adresse">Adresse</label>
                       <input type="password" class="form-control" id="input_adresse_p" name="adresse" placeholder="Adresse">
                   </div>
                   <div class="form-group">
                       <label for="input_ville">Ville</label>
                       <input type="password" class="form-control" id="input_ville_p" name="ville" placeholder="Ville">
                   </div>
                   <input type="hidden" name="type_inscription" value="particulier">
                   <button type="submit" class="btn btn-primary">Valider</button>
               </form>
           </div>

            <br><br><br>

           <div>
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
                       <input type="password" class="form-control" id="input_adresse_c" name="adresse" placeholder="Adresse">
                   </div>
                   <div class="form-group">
                       <label for="input_ville">Ville</label>
                       <input type="password" class="form-control" id="input_ville_c" name="ville" placeholder="Ville">
                   </div>
                   <button type="submit" class="btn btn-primary">Valider</button>
               </form>
           </div>
       </div>
        <footer></footer>
    </body>
    <script src="inscription.js"></script>
</html>