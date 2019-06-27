<?php
/**
 * Created by PhpStorm.
 * User: Sandrine
 * Date: 22/05/2019
 * Time: 23:06
 */

class beneficiaire
{
    private $id;
    private $name;
    private $adress;
    private $city;
    private $lat;
    private $long;
    private $type;

    public function __construct($id,$name,$adress,$city,$lat,$long,$type)
    {
        $this->id=$id;
        $this->name=$name;
        $this->adress=$adress;
        $this->city=$city;
        $this->lat=$lat;
        $this->long=$long;
        $this->type=$type;
    }

    public function getId(){ return $this->id; }
    public function getName(){ return $this->name; }
    public function getAdress(){ return $this->adress; }
    public function getCity(){ return $this->city; }
    public function getLat(){ return $this->lat; }
    public function getLong(){ return $this->long; }
    public function getType(){ return $this->type; }

}