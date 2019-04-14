<?php

require_once __DIR__ . "/../../includes.php";

$db=DatabaseManager::getManager();

if (isset($_POST['connexionForm'])) {
    $adresseMail = htmlspecialchars($_POST['adresseMail']);
    $password = password_hash(htmlspecialchars($_POST['password']), PASSWORD_DEFAULT);
    if (!empty($adresseMail) and !empty($password)) {
    $request="SELECT * FROM membres WHERE mail = ? AND motdepasse = ?";
    $db->findOne($request, [$mail]);
        $userexist = $requser->rowCount();
        if ($userexist == 1) {
        	$userinfo = $requser->fetch();
            $_SESSION['id'] = $userinfo['id'];
            $_SESSION['nom'] = $userinfo['nom'];
            $_SESSION['prenom'] = $userinfo['prenom'];
            header("Location: index.php?id=" . $_SESSION['id']); 
        } else {
            $erreur = "Mauvais mail ou mot de passe !";
        }
    } else {
        $erreur = "Tous les champs doivent être complétés !";
    }
}