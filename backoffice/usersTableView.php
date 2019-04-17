<?php
/**
 * Created by PhpStorm.
 * User: Sandrine
 * Date: 26/03/2019
 * Time: 23:19
 */

require_once __DIR__ . '/../includes.php';

?>


<!DOCTYPE html>

<html lang="fr">
<head>
    <meta charset="utf-8"/>
    <link href="../css/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/header.css" rel="stylesheet">
    <link href="../css/general.css" rel="stylesheet">
    <link href="../css/backoffice.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <title>Administration : </title>
</head>

<body>
<?php require_once __DIR__ . '/../headerBack.php'; ?>
<div class="row">
    <div class="col-md-1"></div>
    <div class="content col-md-10">

        <!--Navbar Infos Users -->
        <div class="btn-group btn-group-toggle" id="buttonsUsers" data-toggle="buttons">
            <input class="btn btn-secondary" type="button" value="Afficher tous les utilisateurs" onclick="allUsers()">
            <input class="btn btn-secondary" type="button" value="Afficher particuliers" onclick="users('particulier')">
            <input class="btn btn-secondary" type="button" value="Afficher commercants" onclick="users('commercant')">
            <input class="btn btn-secondary" type="button" value="Afficher salariés" onclick="users('salary')">
        </div>

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#addModal">
            Inscrire un utilisateur
        </button>

        <!-- Modal -->
        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog .modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ajouter un utilisateur</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" id="add_user">
                            <label id="emailSetError">Cette adresse email est déjà utilisée</label>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Type utilisateur</label>
                                <select class="form-control" id="typeUser">
                                    <option>Particulier</option>
                                    <option>Commerçant</option>
                                    <option>Salarié</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="InputNom">Nom</label>
                                <input type="text" class="form-control" id="inputName" aria-describedby="nom"
                                       placeholder="Nom / Nom commerce">
                                <small id="nameError" class="form-text text-muted">Contient 1-100 caractères</small>
                            </div>
                            <div class="form-group">
                                <label for="InputNom">Prénom (non obligatoire pour les commerçants)</label>
                                <input type="text" class="form-control" id="inputPname" aria-describedby="prenom"
                                       placeholder="Prenom">
                                <small id="pnameError" class="form-text text-muted">Contient 1-100 caractères</small>
                            </div>
                            <div class="form-group">
                                <label for="InputEmail1">Adresse Email</label>
                                <input type="email" class="form-control" id="inputEmail" aria-describedby="emailHelp"
                                       placeholder="Enter email">
                                <small id="emailError" class="form-text text-muted">Contient 1-100 caractères</small>
                            </div>
                            <div class="form-group">
                                <label for="InputPassword1">Password</label>
                                <input type="password" class="form-control" id="inputPwd" placeholder="Password">
                                <small id="pwdError" class="form-text text-muted">Contient 1-100 caractères</small>
                            </div>
                            <div class="form-group">
                                <label for="InputNom">Adresse</label>
                                <input type="text" class="form-control" id="inputAdress" aria-describedby="adress"
                                       placeholder="Adresse">
                            </div>
                            <div class="form-group">
                                <label for="InputNom">Ville</label>
                                <input type="text" class="form-control" id="inputCity" aria-describedby="city"
                                       placeholder="Ville">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="table">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col" id="name">Nom</th>
                    <th scope="col" id="pname">Prenom</th>
                    <th scope="col">Adresse Email</th>
                    <th scope="col">Adresse</th>
                    <th scope="col">Ville</th>
                    <th scope="col">Role(s)</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody id="tbody">

                </tbody>
            </table>
        </div>
    </div>
    <div class="col-md-1"></div>
</div>
<script src="usersTable.js"></script>
<script src="../css/bootstrap/js/bootstrap.bundle.min.js"></script>
<footer></footer>
</body>
</html>
