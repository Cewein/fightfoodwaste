<?php

require_once __DIR__ . "/../../includes.php";
require_once ('tour.php');
require_once __DIR__ . "/../UpdateButtons.php";


    $validatedWonder = getRequestsByStatut('checkedTrue');
    //var_dump($validatedWonder);
    
    if(isset($validatedWonder)) {
        $userInfos = getAllValidatedWonder();
   // var_dump($userInfos); 
    }

    $contacts=[];
  
    if (count($userInfos) > 0) {
        for ($i = 0; $i<count($userInfos); $i++) {


            $contacts[$i] = new tour (
            
            $userInfos[$i]['id_demande'],
            $userInfos[$i]['nom'],
            $userInfos[$i]['prenom'],
            $userInfos[$i]['n_SIREN'],
            $userInfos[$i]['adresse'],
            $userInfos[$i]['ville']
            );
        
        } 

    // $idCollection = 0;
            foreach ($contacts as $contact) {
                $defaultRow = "<tr id=\"" . $contact->getIdWonder() . " \"><th scope=\"row\">" . $contact->getIdWonder() . "</th>";
                $defaultRow .= "<td>" . $contact->getLastName() . "</td>";
                $defaultRow .= "<td>" . $contact->getFirstName() . "</td>";
                $defaultRow .= "<td>" . $contact->getSirenNumber() . "</td>";
                $defaultRow .= "<td>" . $contact->getAddress() . "</td>";
                $defaultRow .= "<td>" . $contact->getCity() . "</td>";
                $defaultRow .= "</tr>";
                
               // $idCollection++;

                 echo $defaultRow; 
    }
}         

