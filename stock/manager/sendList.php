<?php
require_once(__DIR__.'./../models/list.php');
require_once(__DIR__.'/../../database/database.php');

class SendList {

    private $listArti;

    //to construct the list it need to send all barcode in a .json to the webpage
    public function __construct($json)
    {
        $this->listArti = new ArticleList();
        $decoded = json_decode($json, true);
        foreach($decoded as &$value)
        {
            $article = new Article($value["barcode"], $value["size"]);
            $this->listArti->add($article);
        }
    }

    public function send()
    {
        $db = DatabaseManager::getManager();

        $db->exec("INSERT INTO `demande`(`statut`) VALUES (?)",[0]);
        $demandID = $db->findOne("SELECT last_insert_id()");
        $demandID = $demandID["last_insert_id()"];

        $size = $this->listArti->getSize();

        for ($i=0; $i < $size; $i++) 
        { 
            $tmpArticle = $this->listArti->getArticle($i);
            $tmpBarcode = $tmpArticle->getBarcode();
            var_dump($tmpBarcode);
            $db->exec("INSERT INTO `produit`(`code_barre`, `quantite`,`id_demande`) VALUES (?,?,?)",[$tmpBarcode->getCode(), $tmpArticle->getNumber(), $demandID]);
        }
        return 1;
    }
}