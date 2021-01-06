<!-- NAMA : Dinda Ayu Febriani -->
<!-- NRP : 1872043 -->
<?php

class ArtistsDaoImpl{
    public function fetchArtistsData(){
        $link = PDOUtil::createConnection();
        $query = "SELECT * FROM artists";
        $result = $link->query($query);
        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Artists');
        PDOUtil::closeConnection($link);
        return $result;
    }

    /**
     * @param $idartists
     * @return Artists
     */
    public function fetchArtists($idartists){
        $link = PDOUtil::createConnection();
        $query = "SELECT * FROM artists WHERE idartists = ?";
        $stmt = $link->prepare($query);
        $stmt->bindParam(1, $idartists);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();
        PDOUtil::closeConnection($link);
        return $stmt->fetchObject('Artists');
    }
    
    public function addArtists(Artists $artists){
        $result = 0;
        $link = PDOUtil::createConnection();
        $query = "INSERT into artists (name, debut, company) VALUES (?, ?, ?)";
        $stmt = $link->prepare($query);
        $stmt->bindValue(1, $artists->getName());
        $stmt->bindValue(2, $artists->getDebut());
        $stmt->bindValue(3, $artists->getCompany());
        $link->beginTransaction();
        if($stmt->execute()){
            $link->commit();
            $result = 1;
        } else{
            $link->rollBack();
        }
        PDOUtil::closeConnection($link);
        return $result;
    }

    public function deleteArtists($idartists){
        $result = 0;
        $link =  PDOUtil::createConnection();
        $query = "DELETE FROM artists WHERE idartists = ?";
        $stmt = $link->prepare($query);
        $stmt->bindParam(1, $idartists);
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

    public function updateArtists(Artists $artists){
        $result = 0;
        $link = PDOUtil::createConnection();
        $query = "UPDATE artists SET name = ?, debut = ?, company = ? WHERE idartists = ?";
        $stmt = $link->prepare($query);
        $stmt->bindValue(1, $artists->getName());
        $stmt->bindValue(2, $artists->getDebut());
        $stmt->bindValue(3, $artists->getCompany());
        $stmt-> bindValue(4, $artists->getIdartists());
        $link->beginTransaction();
        if($stmt->execute()){
            $link->commit();
            $result = 1;
        } else{
            $link->rollBack();
        }
        PDOUtil::closeConnection($link);
        return $result;
    }
}