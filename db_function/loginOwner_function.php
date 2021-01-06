<!-- NAMA : Dinda Ayu Febriani -->
<!-- NRP : 1872043 -->
<?php
function login($nip, $password){
    $link = PDOUtil::createConnection();
    $query = "SELECT * FROM owner WHERE nip = ? AND password = ?";
    $stmt = $link->prepare($query);
    $stmt->bindParam(1, $nip);
    $stmt->bindParam(2, $password);
    $stmt->execute();
    $result = $stmt->fetch();
    PDOUtil::closeConnection($link);
    return $result;
}