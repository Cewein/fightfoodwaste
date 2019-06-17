<?php

require_once __DIR__ . '/../../includes.php';

if (isset($_POST['idLivraison']) === true && isset($_POST['etat']) === true) {
    setLivraisonEtat($_POST['idLivraison'], $_POST['etat']);
}