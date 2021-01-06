<!-- NAMA : Dinda Ayu Febriani -->
<!-- NRP : 1872043 -->
<?php

class AlbumDaoImpl{
    public function fetchAlbumsData(){
        $link = PDOUtil::createConnection();
        $query = 'SELECT a.*, b.name FROM albums a JOIN artists b ON a.artists_idartists = b.idartists';
        $result = $link->query($query);
        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Albums');
        PDOUtil::closeConnection($link);
        return $result;
    }
    
    public function fetchAlbum($id){
        $link =  PDOUtil::createConnection();
        $query = "SELECT a.*, b.name FROM albums a JOIN artists b ON a.artists_idartists = b.idartists where a.idalbums = ".$id;
        $result = $link->query($query);
        PDOUtil::closeConnection($link);
        return $result;
    }
    
    /**
     * @param $id
     * @return albums
     */
    public function fetchSelectedAlbumData($idalbums){
        $link =  PDOUtil::createConnection();
        $query = "SELECT *FROM albums WHERE idalbums = ?";
        $stmt= $link->prepare($query);
        $stmt->bindParam(1,$idalbums);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();
        PDOUtil::closeConnection($link);
        return $stmt->fetchObject('Albums');
    }
    
    public function addAlbums(albums $albums){
        $result = 0;
        $link =  PDOUtil::createConnection();
        $query = "INSERT INTO albums (title, releasedate, producers, artists_idartists, cover) values (?, ?, ?, ?, ?)";
        $stmt = $link->prepare($query);
        $stmt->bindValue(1, $albums->getTitle());
        $stmt->bindValue(2, $albums->getReleasedate());
        $stmt->bindValue(3, $albums->getProducers());
        $stmt->bindValue(4, $albums->getArtists_idartists());
        $stmt->bindValue(5, $albums->getCover());
        $link->beginTransaction();
        if($stmt->execute()){
            $link->commit();
            $result = 1;
        }
        else{
            $link->rollBack();
        }
        PDOUtil::closeConnection($link);
        return $result;
    }
    
    public function deleteAlbums($idalbums){
        $result = 0;
        $link =  PDOUtil::createConnection();
        $query = "DELETE FROM albums WHERE idalbums = ?";
        $stmt = $link->prepare($query);
        $stmt->bindParam(1, $idalbums);
        $link->beginTransaction();
        if($stmt->execute()){
            $link->commit();
            $result = 1;
        }
        else{
            $link->rollBack();
        }
        PDOUtil::closeConnection($link);
        return $result;
    }

    public function updateAlbums(albums $albums){
        $link =  PDOUtil::createConnection();
        $link->beginTransaction();
        $link->setAttribute(PDO::ATTR_AUTOCOMMIT, false);
        $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        if ($albums->getCover() != null) {
            $query = "UPDATE albums SET title = ?, releasedate = ?, producers = ?, artists_idartists = ?, cover = ? WHERE idalbums = ?";
        } else { 
            $query = "UPDATE albums SET title = ?, releasedate = ?, producers = ?, artists_idartists = ? WHERE idalbums = ?";
        }
        $stmt = $link->prepare($query);
        $stmt->bindValue(1, $albums->getTitle());
        $stmt->bindValue(2, $albums->getReleasedate());
        $stmt->bindValue(3, $albums->getProducers());
        $stmt->bindValue(4, $albums->getArtists_idartists());
        $stmt->bindValue(5, $albums->getCover());
        if ($albums->getCover() != null) { 
            $stmt->bindValue(5, $albums->getCover());
            $stmt->bindValue(6, $albums->getIdalbums());
        } else { 
            $stmt->bindValue(5, $albums->getIdalbums());
        }
        if ($stmt->execute()) {
            $link->commit();
        } else {
            $link->rollBack();
        }
        PDOUtil::closeConnection($link);
    }
}