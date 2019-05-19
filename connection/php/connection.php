<?php
/**
 * Created by SublimeText3.
 * User: Rebecca
 * Date: 08/04/2019
 * Time: 22:43
 */

require_once __DIR__ . '/../includes.php';

?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<title>Se connecter</title>
		<meta charset="utf-8">
		<meta name="connection" description="formulaire de description">
	</head>
	<body>
		<center>
			<h1>Fight Food Waste</h1>
			<form action="checkConnection.php" method="post" enctype="">
				<legend>
					<fieldset>Soyez les bienvenue !!</fieldset>
					<input type="mail" name="adresseMail" placeholder="Adresse email" id="mail" required="required">
					<input type="password" name="password" placeholder="Mot de passe" id="pwd" required="required">
					<input type="button" value="Se connecter" onclick="checkConnection()">
				</legend>
			</form>
		</center>
		<script src="connection.js"></script>
	</body>
</html>
