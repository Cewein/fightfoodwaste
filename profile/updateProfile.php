<?php


require_once('../includes.php');
include("profileCheck.php");


?>
<html>

<head>
  <title>Page de profil utilisateur</title>
  <meta charset="utf-8">
</head>

<body>
  <div align="center">
    <?php if (isset($_SESSION['id'])) {

      $id = ($_SESSION['id']);
      $userInfo = readUser($id);



      ?>


      <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
      <link href="../css/updateProfile.css" rel="stylesheet">
      <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
      <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <!------ Include the above in your HEAD tag ---------->

      <br><br>

      <div class="container">
        <div class="row">
          <div class="col-md-3 ">
            <div class="list-group ">
              <a href="#" class="list-group-item list-group-item-action active">Dashboard</a>
              <a href="#" class="list-group-item list-group-item-action">User Management</a>
              <a href="#" class="list-group-item list-group-item-action">Used</a>
              <a href="#" class="list-group-item list-group-item-action">Enquiry</a>
              <a href="#" class="list-group-item list-group-item-action">Dealer</a>
              <a href="#" class="list-group-item list-group-item-action">Media</a>
              <a href="#" class="list-group-item list-group-item-action">Post</a>
              <a href="#" class="list-group-item list-group-item-action">Category</a>
              <a href="#" class="list-group-item list-group-item-action">New</a>
              <a href="#" class="list-group-item list-group-item-action">Comments</a>
              <a href="#" class="list-group-item list-group-item-action">Appearance</a>
              <a href="#" class="list-group-item list-group-item-action">Reports</a>
              <a href="#" class="list-group-item list-group-item-action">Settings</a>


            </div>
          </div>
          <div class="col-md-9">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <h4>Modifier vos informations personnelles</h4>
                    <br>
                    <img alt='avatar par défaut' src="../pictures/user.png">
                    <hr>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <form action="profileCheck.php" method=" POST">
                      <?php if (isset($_SESSION['roles']) == 'administrateur' || isset($_SESSION['roles']) == 'salary' || isset($_SESSION['roles']) == 'particulier') { ?>
                        <div class="form-group row">
                          <label for="name" id="nom" class="col-4 col-form-label">Nom</label>
                          <div class="col-8">
                            <input id="username" name="username" placeholder="Username" class="form-control here" value="<?= $userInfo['nom']; ?>" required=" required" type="text">
                          </div>
                        </div>
                      <?php } else if (isset($_SESSION['roles']) == 'commercant') {  ?>
                        <div class="form-group row">
                          <label for="name" id="nom" class="col-4 col-form-label">Nom du commerce</label>
                          <div class="col-8">
                            <input id="username" name="username" placeholder="Username" class="form-control here" value="<?= $userInfo['nom']; ?>" required=" required" type="text">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="name" id="nom" class="col-4 col-form-label">Numéro de SIREN</label>
                          <div class="col-8">
                            <input id="username" name="username" placeholder="Username" class="form-control here" value="<?= $userInfo['n_SIREN']; ?>" required=" required" type="text">
                          </div>
                        </div>
                      <?php } ?>
                    < div clas s ="form-group row ">
                       <label f o r="email"   id="mailAddress" c l ass="col-4 col-form-la b el">Adresse  m a il</l abel>
                       <div  c lass="c ol-8">
                       <inp u t id="email"   name="email" placeh o lder="Email"   class="form-control here"   value="<?php  echo $userInfo['adresse_mail ']; ?>" re q uired="required "  type= "text">
                         </div>
                         </div>
                       <di v  class="form-gro up row">
                       <l a bel for="ne w pass" id="passw o rd" class="col-4 col-f o rm-label">Mo t   de pa sse</label>
                         <div cl ass="col-8">
                         <input id="ne w pass" name="newpass"  p laceholder="un nouveau mot de pas s e ? " class="form-control   here" v a lue=""  type="text">
                         </div>
                         </div>
                         <div class="fo rm-group row">
                         <label f o r="newpass" id= " password" class="col-4   col-form-label">Confirmation   d u mot  de passe</label>
                         < div class="col-8">
                         <input  i d="newpass" name="new p ass" placeholder="Retapez votre mo t  de passe " class="form-c o ntrol h e re" va lue="" type="text">
                        </div 
                       </div>

                        <div cla ss="form-group row">
                        <label   for="pAddress" class=" c ol-4 col-form-l a b el">A dresse postale</labe l
                         <div class="col-8" 
                        <in p ut id="pAddress" na m e="email" plac e holder="Adresse" class="f o rm-co ntrol her e" value="<?= $userInfo[' a dresse']; ?>" r e quired ="required" type="te x t
                       < /di
                       </div
                        <di v class="form-group  row"
                          <label   for="city" id="city" c l ass=" c o l-4 c ol-form-label">Ville </label
                       <div class=" col-8"
                         <input id="c i ty" name="ci t y" placeholder="Ville" cl a ss="f orm-contr ol here" valu e="<?= $userInfo['ville'];   ?>" re quired="required" ty p e=" tex
                         </d
                       </ d 
                       <div class="form- group ro w
                       <div class="offset -4 col-8"
                        <input type="butt o n" class="btn  b tn-primary" n ame="submit" value=" E nre gistre
                         </d
                         </d
                       <div class="fo rm-group   ro
                       <div class="off set-4  c ol-
                       <a href="pr ofile.php"
                        <input type="b u tton" class="b t n btn-pri mary" name="ignore" va l u e="Annule
                         <
                         </d
                         </d
                         </fo

                      <a href=". . /connection/ph p / d isconnection.php"> S e d éconnecter<

                       </ d 
                        </ d

                         </ 
                        </ d
                        </ d
                      < /div
                       </ di

                      </div>
                      </body>

                      </html>
                      <?php
                    } else {
                      header('Location: ../connection/connection.php');
                      exit();
                    }
                    ?>