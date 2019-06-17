<?php
class Gathering {

    //liste des attributs
    private $idGat;
    private $date;
    private $status;
   


    //constructeur
    public function __construct(
        $idGat,
        $date,
        $status
    ) {

        $this->idGat = $idGat;
        $this->date = $date;
        $this->status = $status;
    }


    //getters
    public function getIdGat() { return $this->idGat; }
    public function getDate() { return $this->date; }
    public function getStatus() { return $this->status; }
   
    //setters
    public function setIdGat($idGat) { $this->idUser = (int)$idGat; }

    public function setDate($date) { $this->date = $date; }

    public function setStatus($status) { return $this->$status; }
   



    public function test()
    {
        var_dumps(get_object_vars($this));
    }

}
