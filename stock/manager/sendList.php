<?php
require_once(__DIR__.'/../models/list.php');
require_once(__DIR__.'/../../database/database.php');
require_once (__DIR__.'/../../includes.php');

class SendList {

    private $listArti;
    private $userId;

    //to construct the list it need to send all barcode in a .json to the webpage
    public function __construct($json)
    {
        $this->listArti = new ArticleList();
        $decoded = json_decode($json, true);
        foreach($decoded as &$value)
        {
            if(isset($value['barcode'])===true){
                $article = new Article($value["barcode"], $value["size"]);
                $this->listArti->add($article);
            }
            else{
                $this->userId=$value["id"];
            }

        }
    }

    public function getUserId(){return $this->userId;}

    public function send()
    {
        $db = DatabaseManager::getManager();

        $db->exec("INSERT INTO `demande`(`statut`) VALUES (?)",["En attente"]);
        $demandID = $db->findOne("SELECT last_insert_id()");
        $demandID = $demandID["last_insert_id()"];

        $size = $this->listArti->getSize();

        for ($i=0; $i < $size; $i++) 
        { 
            $tmpArticle = $this->listArti->getArticle($i);
            $tmpBarcode = $tmpArticle->getBarcode();
            $db->exec("INSERT INTO `produit`(`code_barre`, `quantite`,`id_demande`) VALUES (?,?,?)",[$tmpBarcode->getCode(), $tmpArticle->getNumber(), $demandID]);
        }

        //Create interraction User / Request
        setInteraction($this->userId,$demandID,"creation", time());

        return 1;
    }
}