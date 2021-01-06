<?php

class artistsUpdateController{

    private $artistsDao;

    public function __construct()
    {
        $this->artistsDao = new ArtistsDaoImpl;
    }

    public function index(){
        $artid = filter_input(INPUT_GET,'artid');
        if(isset($artid)){
            $artists = $this->artistsDao->fetchArtists($artid);
        }

        $submitPressed = filter_input(INPUT_POST, "btnSubmit");
        if(isset($submitPressed)) {
            // Get Data dari Form
            $name = filter_input(INPUT_POST, "txtName");
            $debut = filter_input(INPUT_POST, "txtDebut");
            $company = filter_input(INPUT_POST, "txtCompany");
            $updatedArtists = new Artists();
            $updatedArtists->setIdartists($artists->getIdartists());
            $updatedArtists->setName($name);
            $updatedArtists->setDebut($debut);
            $updatedArtists->setCompany($company);

            $result = $this->artistsDao->updateArtists($updatedArtists);
            header("location:index.php?navito=artists");
        }
        include_once 'artists_update.php';
    }
}