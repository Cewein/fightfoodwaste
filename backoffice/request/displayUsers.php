<?php

require_once __DIR__ . "/../../includes.php";
//require_once ("demandesView.js");
//require_once ("requestsStatut.php");
//require_once ("request.php");
require_once ("../foodCollection/tour.php");



/*$requestsStatut = getRequestsByStatut($_POST['type']);

$i = 0;
$idRequestList = "";

foreach ($requestsStatut as $singleRequest) {
    $requests[$i] = new Request($singleRequest['identifiant'], $singleRequest['statut'], $singleRequest['id_collecte']);
    $idRequestList .= $requests[$i]->getId();
    if (isset($requestsStatut[$i + 1]) === true) {
        $idRequestList .= ",";
    }
    $i++;
}
//if($requestsStatut =='checkedTrue') { 
if($singleRequest['statut'] == 'checkedTrue') { 
   
    echo "ok"; 
} else {
    echo "ko"; 
}
*/

    //step 1 : afficher les demandes validées 
$requestsStatut = getAllValidatedWonder();
var_dump($requestsStatut);

//step 2 : afficher l'identifiant de l'utilisateur qui a fait la demande validée
$userValidate = getUserId(); 
var_dump($userValidate); 
/*
    if (isset($_GET['idDemande'])) {
        if($_GET['idDemande'] == 'checkedTrue') {
        var_dump($userValidate); 
        }
        
    }*/


$test = getAllReferentUsers(); 
var_dump($test);


/*$i = 0;
$idRequestList = "";

foreach ($requestsStatut as $singleRequest) {
    $requests[$i] = new Request($singleRequest['identifiant'], $singleRequest['statut'], $singleRequest['id_collecte']);
    $idRequestList .= $requests[$i]->getId();
    if (isset($requestsStatut[$i + 1]) === true) {
        $idRequestList .= ",";
    }
    $i++;
}

    if (isset($requests)) {
    echo ('ok pour la condition'); 
     $idDemande = $_POST['demande'];
    $allProduct = getProductsByDemandeId($idDemande);


/*  $allUsersId = getUserId($idDemande);
    echo $allUsersId; 

   $validatedWonder = $_POST['statut'];
    $allValidatedWonder = getAllValidatedWonder($statut); */
     
  /* echo "ouf";

 } else {
    echo "not ok"; 
    var_dump($requests);
}

/*
    if(isset($_POST['demande'])) {
        echo('ok pour la condition'); 
       $requestsStatut = getRequestsByStatut($_POST['type']);
       
       
        echo ('ok');
        
        if(isset($idDemande)) {

        }
    

    $row = "Aucune demande n\'a été validée"; 

    foreach($allUser as $user) {
        $viewLine = new Tour ($id, 
                             $fName,
                             $lName,
                             $siren,
                             $addr, 
                             $city, 
                             $idTour)
                            ;

        $row = "<tr><th scope=\"row\">" . $viewLine->getUserId(). "</th>";
        $row .= "<td>" . $viewLine->getLastName() . "</td>";
        $row .= "<td>" .  $viewLine->geTfirstName() . "</td>";
        $row .= "<td>" .  $viewLine->getSirenNumber() . "</td>";
        $row .= "<td>" .  $viewLine->getAddress() . "</td>";
        $row .= "<td>" .  $viewLine->getCity() . "</td>";
        $row .= "<td>" .  $viewLine->getIdTour() . "</td>"; 
       
        $row .= "</tr>";
    }
    echo $row;

        
}    



/*

if( isset($_POST['type'])) {
    $requestsStatut = getRequestsByStatut($_POST['type']);
    echo ('ok'); 
}
$i = 0;
$idRequestList = "";

foreach ($requestsStatut as $singleRequest) {
    $requests[$i] = new Request($singleRequest['identifiant'], $singleRequest['statut'], $singleRequest['id_collecte']);
    $idRequestList .= $requests[$i]->getId();
    if (isset($requestsStatut[$i + 1]) === true) {
        $idRequestList .= ",";
    }
    $i++;
}
echo $idRequestList;
   
/*
    $name = $_POST['name']; 
    $pname = $_POST['pname'];
    $adress = $_POST['adresse'];
    $city = $_POST['city']; 
    $userId = getAllReferentUsers($idDemande, $name, $pname, $adress, $city);
 
    
  // echo $userId; */
/*
$requestsStatut = getRequestsByStatut($_POST['type']);

    if($requestsStatut == 'checkedTrue') {
        echo('ok'); 

        foreach ($requestsStatut as $requeststatut) {

                $row = "<tr><th scope=\"row\">" . $request -> getId() . "</th>";
                $row .= "<td>" . $request -> getCreator(). "</td>";
                $row .= "<td>" . $_POST['pname'] . "</td>";
                $row .= "<td>" . $_POST['adress'] . "</td>";
                $row .= "<td>" . $_POST['city'] . "</td>";
                $row .= "</tr>";
        //   }

           
        }
        echo $row;

    } else {
        echo "Aucune demande n'a été validée";
    }
    */
    