<?php

class loginMemberDaoImpl{
    public function login(login $loginMember){
        $link = PDOUtil::createConnection();
        $query = "SELECT * FROM member WHERE id_member = ? AND password = ?";
        $stmt = $link->prepare($query);
        $stmt->bindValue(1, $loginMember->getNip());
        $stmt->bindValue(2, $loginMember->getPassword());
        $stmt->execute();
        $result = $stmt->fetch();
        PDOUtil::closeConnection($link);
        return $result;
    }
}