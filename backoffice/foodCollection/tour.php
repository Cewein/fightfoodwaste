<?php 

class Tour {
    //liste des attributs
    private $idWonder;
    private $idUser; 
    private $lastName; 
    private $firstName; 
    private $sirenNumber; 
    private $address; 
    private $city; 


    //constructeur
    public function __construct ($idWonder,
                                 $idUser,
                                 $lastName,
                                 $firstName,
                                 $sirenNumber,
                                 $address,
                                 $city) {

        $this->idWonder = $idWonder; 
        $this->idUser = $idUser; 
        $this->lastName = $lastName; 
        $this->firstName = $firstName; 
        $this->sirenNumber = $sirenNumber; 
        $this->address = $address; 
        $this->city = $city; 
                                 }


    //getters
    public function getIdWonder() { return $this->idWonder; }
    public function getIdUser() { return $this->idUser; }
    public function getLastName() { return $this->lastName; }
    public function getFirstName() { return $this->firstName; }
    public function getSirenNumber() { return $this->sirenNumber; }
    public function getAddress() { return $this->address; }
    public function getCity() { return $this->city; }
   

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