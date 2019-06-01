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


public function test() {
    var_dumps(get_object_vars($this)); 
}

//$test = new tour();
//var_dump(get_object_vars($test));
/*
$test->test(); 

    public function __toString() {
        return 
            'IdUser :'.$this->idUser;
         
            'Nom : ' . $this->lastName;
        
            'Prénom : ' . $this->firstName;
           
            'Numéro de siren : ' . $this->siren;
          
            'Adresse : ' . $this->address;
        
            'Ville : ' . $this->city;
          
            'Collecte : ' . $this->idTour;


    }

}*/
}