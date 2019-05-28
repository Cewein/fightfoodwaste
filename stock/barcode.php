<?php

class Barcode
{
    //variable
    private $code;
    private $jsonLink;
    private $jsonFile;
    private $json;

    //constuctor
    public function __construct($bc)
    {
        $this->barcode = $bc;                                                         // we set the barcode from the constructor variable
        $this->jsonLink = "https://fr.openfoodfacts.org/api/v0/produit/".$bc.".json"; // we create the openFoodFact API link
        $this->jsonFile = file_get_contents($this->jsonLink);                         // we praise get the json
        $this->json = json_decode($this->jsonFile);                                   // we praise the json, it create a class
    }

    //getter
    public function getBarcode() { return $this->code; }
    public function getJsonLink() { return $this->jsonLink; }
    public function getJsonFile() { return $this->jsonLink; }
    public function getJson() { return $this->json; }

}
