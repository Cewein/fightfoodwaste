<?php

require_once __DIR__ . "/../../includes.php";
require_once ( "../foodCollection/tour.php");
//require_once ("Request.php");
//require_once ("requestsStatut.php");



/*if(isset($_POST['demande'])==true) { 
    $idDemande = $_POST['demande'];
    $allProduct = getProductsByDemandeId($idDemande);


    $allUsersId = getUserId($idDemande); 
    echo $allUsersId; 

*/

if (isset($_POST['demande']) === true) {
    $idDemande = $_POST['demande'];
    $allProduct = getUserId($idDemande);

/*if (isset($_POST['type']) === true) {
    $status = $_POST['type'];
    $allStatus = getRequestsByStatut($status); */
}


    if(isset($allStatus)) {
        echo ('ok');
    }

    $row = "Aucune demande n\'a été validée"; 

    foreach($allUsers as $user) {
        $viewLine = new Tour(); 

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
//}
