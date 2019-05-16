<?php 

class Tour {
    //liste des attributs
    private $idUser; 
    private $lastName; 
    private $firstName; 
    private $sirenNumber; 
    private $address; 
    private $city; 
    private $idTour; //identifiant pour la collecte ou la tournée 

    //constructeur
    public function __construct (int $id,
                                 string $lName,
                                 string $fName,
                                 int $siren,
                                 string $addr,
                                 string $city,
                                 int $idTour) {
        
        $this->idUser = $id; 
        $this->lastName = $lName; 
        $this->firstName = $fName; 
        $this->sirenNumber = $siren; 
        $this->address = $addr; 
        $this->city = $city; 
        $this->idTour + $idTour; 
    }

    //getters
    public function getIdUser(): int { return $this->idUser; }
    public function getLastName(): string { return $this->lastName; }
    public function getFirstName(): string { return $this->firstName; }
    public function getSirenNumber(): int { return $this->sirenNumber; }
    public function getAddress(): string { return $this->address; }
    public function getCity(): string { return $this->city; }
    public function getIdTour(): int { return $this->idTour; }

    //setters
    public function setIdUser($id) {$this->idUser = $id; }
    public function setLastName($lName) {$this->lastName = $lName; }
    public function setFirstName($fName) {$this->firstName = $fName; }
    public function setSirenNumber($siren) {$this->sirenNumber = $siren; }
    public function setAddr($address) {$this->addr = $address; }    
    public function setCity($city) {$this->city = $city; }
    public function setIdTour($idTour){$this->idTour = $idTour;
    }

    public function __toString() {
        return 'Voici les coordonnées de l\'utilisateur N°'. $this->idUser . ':' ;
        echo "\n" ;
        'Nom : ' . $this->lastName;
        echo "\n";
        'Prénom : ' . $this->firstName;
        echo "\n";
        'Nom : ' . $this->lastName;  

        

    }

        }