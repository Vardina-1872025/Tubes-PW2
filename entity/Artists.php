<!-- NAMA : Dinda Ayu Febriani -->
<!-- NRP : 1872043 -->
<?php

class Artists{
    private $idartists;
    private $name;
    private $debut;
    private $company;

    // idartists
    public function getIdartists(){
        return $this->idartists;
    }

    public function setIdartists($idartists){
        $this->idartists = $idartists;
    }

    // name
    public function getName(){
        return $this->name;
    }

    public function setName($name){
        $this->name = $name;
    }

    // debut
    public function getDebut(){
        return $this->debut;
    }

    public function setDebut($debut){
        $this->debut = $debut;
    }

    // company
    public function getCompany(){
        return $this->company;
    }

    public function setCompany($company){
        $this->company = $company;
    }
}