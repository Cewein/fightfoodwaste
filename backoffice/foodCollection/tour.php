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

    public function hydrate2(array $tourData) {
        foreach($tourData as $key => $value) {
            $method = 'set'.ucfirst($key);
            if(method_exists($this, $method)) {
                $this->$method($value);
            }
        }
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



    public function hydrate (array $tourData) {
        foreach ($tourData as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    public function setIdUser($id) {$this->idUser = (int) $id; }

    public function setLastName($lName) {

        if(is_string($lName) && strlen($lName) <=255) {
            $this->lastName = (string) $lName; 
        }
    }

    public function setFirstName($fName) {
        if(is_string($fName) && strlen($fName) <= 255) {
            $this->firstName = (string) $fName;
        }
    }

    public function setSirenNumber($siren) {$this->sirenNumber = (int) $siren; }
    public function setAddr($address) {$this->addr = (string) $address; }    
    public function setCity($city) {$this->city = (string) $city; }
    public function setIdTour($idTour){$this->idTour = (int) $idTour;
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