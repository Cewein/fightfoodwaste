<?php
/**
 * Created by PhpStorm.
 * User: Sandrine
 * Date: 30/04/2019
 * Time: 16:01
 */
require_once __DIR__."/../../includes.php";

class Request
{
    private $identifiant;
    private $statut;
    private $creator;
    private $idCollecte;
    private $dateLastAction;

    public function __construct($id,$statut,$idCollecte)
    {
        $this->identifiant=$id;
        $this->statut=$statut;
        $this->idCollecte=$idCollecte;

    }

    public function getId(){ return $this->identifiant; }
    public function getStatut(){ return $this->statut; }
    public function getCollecte(){ return $this->idCollecte; }
    public function getCreator(){ return $this->creator; }

    public function setCreator($creator){ $this->creator=$creator; }

}