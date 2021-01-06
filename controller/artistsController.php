<?php

class artistsController{

    private $artistsDao;

    public function __construct()
    {
        $this->artistsDao = new ArtistsDaoImpl;
    }

    public function index(){
        $artid = filter_input(INPUT_GET, 'artid');
        if(isset($artid)){
            $artists = $this->artistsDao->fetchArtists($artid);
        }
        $command = filter_input(INPUT_GET, 'cmd');
        if(isset($command) && $command == 'del'){
            $artid = filter_input(INPUT_GET, 'artid');
            if(isset($artid)){
                $link = new PDO("mysql:host=localhost; dbname=progweb2", "root", "");
                $link->setAttribute(PDO::ATTR_AUTOCOMMIT, false);
                $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $query = "DELETE FROM artists WHERE idartists = ?";
                $stmt = $link -> prepare($query);
                $stmt-> bindParam(1, $artid);
                $link->beginTransaction();
                if($stmt->execute()){
                    $link->commit();
                } else{
                    $link->rollBack();
                }
                $link = null;
                echo '<div class="bg-success">Data successfully deleted </div>';
            }
        }

        $submitPressed = filter_input(INPUT_POST, "btnSubmit");
        if(isset($submitPressed)) {
            // Get Data dari Form
            $name = filter_input(INPUT_POST, "txtName");
            $debut = filter_input(INPUT_POST, "txtDebut");
            $company = filter_input(INPUT_POST, "txtCompany");

            // Conect ke db
            $artists = new Artists();
            $artists->setName($name);
            $artists->setDebut($debut);
            $artists->setCompany($company);

            $result = $this->artistsDao->addArtists($artists);
            if($result){
                echo '<div class="bg-success">Data successfully added (artists: ' . $name . ')</div>';
            } else{
                echo '<div class="bg-error">Error add data</div>';
            }
        }
        $result = $this->artistsDao->fetchArtistsData();
        include_once 'artists.php';
    }
}