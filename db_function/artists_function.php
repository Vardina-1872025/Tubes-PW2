<!-- NAMA : Dinda Ayu Febriani -->
<!-- NRP : 1872043 -->
<?php
function fetchArtistsData(){
    $link = PDOUtil::createConnection();
    $query = "SELECT * FROM artists";
    $result = $link->query($query);
    PDOUtil::closeConnection($link);
    return $result;
}

function addArtists($name, $debut, $company){
    $result = 0;
    $link = PDOUtil::createConnection();
    $query = "INSERT into artists (name, debut, company) VALUES (?, ?, ?)";
    $stmt = $link->prepare($query);
    $stmt->bindParam(1, $name);
    $stmt->bindParam(2, $debut);
    $stmt->bindParam(3, $company);
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