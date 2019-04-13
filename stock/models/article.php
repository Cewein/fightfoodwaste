<?php

require_once(__DIR__.'./barcode.php');

class Article
{
    //variable
    private $barcode;
    private $name;
    private $descritpion;
    private $picture;
    private $number;

    //constuctor
    public function __construct($bc, $nb = 1)
    {
        //this is needed because thoses letter mess up the C program
        $illegal = ["à","â","é","è","ê","ç","œ","ï","î"];
        $legal = ["a","a","e","e","e","c","oe","i","i"];

        $this->number = $nb;

        $this->barcode = new Barcode($bc);                                                      //EVERYTHING is public in the praised JSO
        $tmpJson = $this->barcode->getJson();                                                   //make a tmp json for safey

        // can be rework with a singleton for removing the isset and isempty use, look on github issue service
        if(isset($tmpJson->product->image_front_url)) $this->picture = $tmpJson->product->image_front_url;                                    
        else $this->picture = "";
        if(isset($tmpJson->product->product_name)) $this->name = str_replace($illegal,$legal,$tmpJson->product->product_name);
        else $this->name = "";
        if(isset($tmpJson->product->generic_name)) $this->description = str_replace($illegal,$legal,$tmpJson->product->generic_name);
        else $this->description = "";
    }

    //getter
    public function getName() { return $this->name;}
    public function getBarcode() { return $this->barcode;}
    public function getPicture() { return $this->getPicture;}
    public function getNumber() { return $this->number; }

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