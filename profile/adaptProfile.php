<?php

require_once ("../includes.php"); 
include ("../connection/connectionSession.php");




    switch($SESSION['role']) {
        case '1' : header('Location : profileAdherent.php'); 


        case '2' : header('Location : profileMerchant.php');
        

        case '3' : header('Location : profileSalary.php');


        case '4' : header('Location : profileAdmin.php'); 
             break; 

        default : header('Location : profileAdherent.php');
            break; 
    }





