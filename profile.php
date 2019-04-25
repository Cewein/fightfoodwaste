<?php


require_once __DIR__ . '/includes.php'; 

if(isset($_GET['id']) AND $_GET['id'] > 0) {
   $getid = intval($_GET['id']);
   $requser = $bdd->prepare('SELECT * FROM membres WHERE id = ?');
   $requser->execute(array($getid));
   $userinfo = $requser->fetch();
?>
<html>
   <head>
      <title>Page de profil utilisateur</title>
      <meta charset="utf-8">
   </head>
   <body>
      <div align="center">
         <?=  if(isset($_SESSION['id']) AND isset($_SESSION['type']) =='particulier') { ?>
            <h2>Profil de <?= $userinfo['name'].' '.$userinfo['pname']; ?></h2>
         <br /><br />
         Nom : <?= $userinfo['name']; ?>
         <br />
         Prénom : <?= $userinfo['pname']; ?>
         <br />
         <? = } else if (isset($_SESSION['id']) AND isset($_SESSION['type']) =='commercant'){ ?>
         <h2>Profil de <?= $userinfo['nameShop'] ?></h2>
         <br /><br />
         Nom du commerce : <?= $userinfo['nameShop']; ?>
         <br />   
         Numéro de SIRET : <?= $userinfo['SIRET']; ?>
         <br />         
         <? = } ?> 
         Adresse mail : <?= $userinfo['mail']; ?>
         <br />
         Mot de passe : <?= hash($userinfo['pwd']); ?>
         <br />
          Adresse postale : <?= $userinfo['address']; ?>
         <br />
          Ville : <?= $userinfo['city']; ?>
         <br />
          Etat du compte ou compte actif ou inactif?  : <?= $userinfo['state']; ?>
         <br />
         <?php
         if(isset($_SESSION['id']) AND $userinfo['id'] == $_SESSION['id']) {
         ?>
         <br />
         <a href="editionprofil.php">Editer mon profil</a>
         <a href="index.php">Retour à la page d'accueil</a>
         <a href="deconnection.php">Se déconnecter</a>
         <?php
         }
         ?>
      </div>
   </body>
</html>
<?php   
}
?>