<!-- 1872043 Dinda Ayu -- !>
<?php
function fetchAlbumsData(){
    $link = PDOUtil::createConnection();
    $query = 'SELECT a.*, b.name FROM albums a JOIN artists b ON a.artists_idartists = b.idartists';
    $result = $link->query($query);
    PDOUtil::closeConnection($link);
    return $result;
}

function fetchAlbum($id){
    $link =  PDOUtil::createConnection();
    $query = "SELECT a.*, b.name FROM albums a JOIN artists b ON a.artists_idartists = b.idartists where a.idalbums = ".$id;
    $result = $link->query($query);
    PDOUtil::closeConnection($link);
    return $result;
}

function fetchSelectedAlbumData($id){
    $link =  PDOUtil::createConnection();
    $query = "SELECT *FROM albums WHERE idalbums = ?";
    $stmt= $link->prepare($query);
    $stmt->bindParam(1,$id);
    $stmt->execute();
    $result = $stmt->fetch();
    PDOUtil::closeConnection($link);
    return $result;
}

function addAlbums($title , $releasedate , $producers, $ar_idartists, $cover = null){
    $result = 0;
    $link =  PDOUtil::createConnection();
    $query = "INSERT INTO albums (title, releasedate, producers, artists_idartists, cover) values (?, ?, ?, ?, ?)";
    $stmt = $link->prepare($query);
    $stmt->bindParam(1, $title);
    $stmt->bindParam(2, $releasedate);
    $stmt->bindParam(3, $producers);
    $stmt->bindParam(4, $ar_idartists);
    $stmt->bindParam(5, $cover);
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

function deleteAlbums($idalbums){
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
?>