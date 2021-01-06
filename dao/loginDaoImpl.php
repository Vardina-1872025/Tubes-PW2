<!-- NAMA : Dinda Ayu Febriani -->
<!-- NRP : 1872043 -->
<?php

class loginDaoImpl{
    public function login(login $login){
        $link = PDOUtil::createConnection();
        $query = "SELECT * FROM owner WHERE nip = ? AND password = ?";
        $stmt = $link->prepare($query);
        $stmt->bindValue(1, $login->getNip());
        $stmt->bindValue(2, $login->getPassword());
        $stmt->execute();
        $result = $stmt->fetch();
        PDOUtil::closeConnection($link);
        return $result;
    }
}