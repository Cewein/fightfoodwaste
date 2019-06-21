<?php 

class Tour {
    //liste des attributs
    private $idWonder; 
    private $lastName; 
    private $firstName;  
    private $address; 
    private $city; 


    //constructeur
    public function __construct ($idWonder,
                                 $lastName,
                                 $firstName,
                                 $address,
                                 $city) {

        $this->idWonder = $idWonder; 
        $this->lastName = $lastName; 
        $this->firstName = $firstName; 
        $this->address = $address; 
        $this->city = $city; 
    }


    //getters
    public function getIdWonder() { return $this->idWonder; }
    public function getLastName() { return $this->lastName; }
    public function getFirstName() { return $this->firstName; }
    public function getAddress() { return $this->address; }
    public function getCity() { return $this->city; }
   

    //setters

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

    public function setAddr($address) {$this->addr = (string) $address; }    
    public function setCity($city) {$this->city = (string) $city; }
  


    public function test() {
        var_dumps(get_object_vars($this)); 
    }


}