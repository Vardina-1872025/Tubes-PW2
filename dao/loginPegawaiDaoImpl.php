<?php

class loginPegawaiDaoImpl{
    public function loginPegawai(login $loginPegawai){
        $link = PDOUtil::createConnection();
        $query = "SELECT * FROM pegawai WHERE nip = ? AND password = ?";
        $stmt = $link->prepare($query);
        $stmt->bindValue(1, $loginPegawai->getNip());
        $stmt->bindValue(2, $loginPegawai->getPassword());
        $stmt->execute();
        $result = $stmt->fetch();
        PDOUtil::closeConnection($link);
        return $result;
    }
}