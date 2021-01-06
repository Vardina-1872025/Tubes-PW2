<?php

class albumsController{

    private $albumsDao;

    public function __construct(){
        $this->albumsDao = new AlbumDaoImpl;
    }

    public function index() {
        $command= filter_input(INPUT_GET,'cmd');
        if(isset($command) &&$command == 'del'){
            $cid= filter_input(INPUT_GET,'cid');
            if(isset($cid)){
                $data = fetchSelectedAlbumData($cid);
                if($data['cover'] != 'default.jpg'){
                    unlink('uploads/'.$data['cover']);
                }
                deleteAlbums($cid);
            }
        }

        $submitPressed = filter_input(INPUT_POST, "btnSubmit");
        if(isset($submitPressed)) {
            // Get Data dari Form
            $title = filter_input(INPUT_POST, "txtTitle");
            $releasedate = filter_input(INPUT_POST, "txtReleaseDate");
            $producers = filter_input(INPUT_POST, "txtProducers");
            $ar_idartists = filter_input(INPUT_POST, "txtArtists");
            $default = 'default.jpg';
            if($_FILES['albumsCover']['name'] != ""){
                $targetDirectory = 'uploads/';
                $fileExtension= pathinfo($_FILES['albumsCover']['name'],PATHINFO_EXTENSION);
                $newFileName=$title . '.' . $fileExtension;
                $targetFile= $targetDirectory.$newFileName;
                if($_FILES['albumsCover']['size']> 1024 *2048){
                    echo '<div class="bg-info">Upload error. File size exceed 2MB</div>';
                }
                else {
                    move_uploaded_file($_FILES['albumsCover']['tmp_name'], $targetFile);
                }

            }
            else{
                $newFileName = $default;
            }
            $albums = new albums();
            $albums->setTitle($title);
            $albums->setReleasedate($releasedate);
            $albums->setProducers($producers);
            $albums->setArtists_idartists($ar_idartists);
            $albums->setCover($newFileName);
            $result = $this->albumsDao->addAlbums($albums);
            if($result){
                echo '<div class="bg-success">Data Succcessfully added (albums: ' . $title . ')</div>';
            }
            else{
                echo '<div class="bg-error">Error add data</div>';
            }
        }
        $result = $this->albumsDao->fetchAlbumsData();
        include_once 'albums.php';
    }
}