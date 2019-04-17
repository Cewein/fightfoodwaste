<?php

require_once(__DIR__.'./barcode.php');

class Article
{
    //variable
    private $barcode;
    private $name;
    private $descritpion;
    private $picture;

    //constuctor
    public function __construct($bc)
    {
        $illegal = ["à","â","é","è","ê","ç","œ","ï","î"];
        $legal = ["a","a","e","e","e","c","oe","i","i"];

        $this->barcode = new Barcode($bc);
        $tmpJson = $this->barcode->getJson();                                                   //make a tmp json for safey
        $this->picture = $tmpJson->product->image_front_url;                                    //get stuff from that json
        $this->name = str_replace($illegal,$legal,$tmpJson->product->product_name);             //EVERYTHING is public in the praised JSON
        $this->description = str_replace($illegal,$legal,$tmpJson->product->generic_name);
    }

    //getter
    public function getName() { return $this->name;}
    public function getBarcode() { return $this->barcode;}
    public function getPicture() { return $this->getPicture;}

    public function toString()
    {
        echo '<h1>'.$this->name.'</h1>
        <br>
        <img src="'.$this->picture.'" />';
    }
    
    public function displayInfo()
    {
        echo $this->name;
        echo "\n";
        echo $this->description;
    }
}