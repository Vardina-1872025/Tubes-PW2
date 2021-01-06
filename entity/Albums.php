<!-- NAMA : Dinda Ayu Febriani -->
<!-- NRP : 1872043 -->
<?php

class Albums{
    private $idalbums;
    private $title;
    private $cover;
    private $releasedate;
    private $producers;
    private $artists_idartists;

    // id albums
    public function getIdalbums(){
        return $this->idalbums;
    }

    public function setIdalbums($idalbums){
        $this->idalbums = $idalbums;
    }

    // title
    public function getTitle(){
        return $this->title;
    }

    public function setTitle($title){
        $this->title = $title;
    }

    // cover
    public function getCover(){
        return $this->cover;
    }

    public function setCover($cover){
        $this->cover = $cover;
    }

    // release date
    public function getReleasedate(){
        return $this->releasedate;
    }

    public function setReleasedate($releasedate){
        $this->releasedate = $releasedate;
    }

    // producers
    public function getProducers(){
        return $this->producers;
    }

    public function setProducers($producers){
        $this->producers = $producers;
    }

    // artist
    public function getArtists_idartists(){
        return $this->artists_idartists;
    }

    public function setArtists_idartists($artists_idartists){
        $this->artists_idartists = $artists_idartists;
    }
}