<?php

class albumsUpdateController{

    private $albumsDao;

    public function __construct()
    {
        $this->albumsDao = new AlbumDaoImpl;
    }

    public function index(){
        $albid = filter_input(INPUT_GET, "albid");
        if (isset($albid)) {
            $albums = $this->albumsDao->fetchSelectedAlbumData($albid);
        }
        $submitPressed = filter_input(INPUT_POST, "btnSubmit");
        if (isset($submitPressed)) {
            //get data dr form
            $title = filter_input(INPUT_POST, "txtTitle");
            $releasedate = filter_input(INPUT_POST, "txtReleaseDate");
            $producers = filter_input(INPUT_POST, "txtProducers");
            $ar_idartists = filter_input(INPUT_POST, "txtArtists");
            $newFileName = $_FILES['albumCover']['name']; 
            $fileExtension = pathinfo($_FILES['albumCover']['name'], PATHINFO_EXTENSION);
            if ($fileExtension != '') { 
                $targetDirectory = 'uploads/';
                $newFileName = $title . '.' . $fileExtension;
                $targetFile = $targetDirectory . $newFileName;
                if ($_FILES['albumCover']['size'] > 1024 * 2048) {
                    echo '<div class = "bg-info">Upload error. File size exceed 2 MB</div>';
                } else {
                    move_uploaded_file($_FILES['albumCover']['tmp_name'], $targetFile);
                }
            }
            $updatedAlbums = new Albums();
            $updatedAlbums->setIdalbums($albums->getIdalbums());
            $updatedAlbums->setTitle($title);
            $updatedAlbums->setReleasedate($releasedate);
            $updatedAlbums->setArtists_idartists($ar_idartists);
            $updatedAlbums->setCover($newFileName);
            if ($newFileName != null) {
                $query = "UPDATE albums SET title = ?, releasedate = ?, producers = ?, artists_idartists = ?, cover = ? WHERE idalbums = ?";
            } else { 
                $query = "UPDATE albums SET title = ?, releasedate = ?, producers = ?, artists_idartists = ? WHERE idalbums = ?";
            }

            $update = $this->albumsDao->updateAlbums($updatedAlbums);
            header("location:index.php?navito=albums");
        }
        include_once 'albums_up.php';
    }
}