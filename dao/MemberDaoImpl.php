<?php
class MemberDaoImpl{

    public function fetchMemberData(){
        $link = PDOUtil::createConnection();
        $query = "SELECT * FROM member";
        $result = $link->query($query);
        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Member');
        PDOUtil::closeConnection($link);
        return $result;
    }

    public function fetchMember($id_member){
        $link = PDOUtil::createConnection();
        $query = "SELECT * FROM member WHERE id_member = ?";
        $stmt = $link->prepare($query);
        $stmt->bindParam(1, $id_member);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();
        PDOUtil::closeConnection($link);
        return $stmt->fetchObject('Member');
    }

    public function updateKendaraan(member $member){
        $result = 0;
        $link = PDOUtil::createConnection();
        $query = "UPDATE member SET plat_motor = ?, plat_mobil = ? WHERE id_member = ?";
        $stmt = $link->prepare($query);
        $stmt->bindValue(1, $member->getPlat_motor());
        $stmt->bindValue(2, $member->getPlat_mobil());
        $stmt->bindValue(3, $member->getId_member());
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

    public function addMember(Member $member){
        $result = 0;
        $link = PDOUtil::createConnection();
        $query = "INSERT into member (id_member, nama_member, email, no_telp, poin, plat_motor, plat_mobil, password, jabatan) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $link->prepare($query);
		$stmt->bindValue(1, $member->getId_member());
        $stmt->bindValue(2, $member->getNama_member());
        $stmt->bindValue(3, $member->getEmail());
        $stmt->bindValue(4, $member->getNo_telp());
        $stmt->bindValue(5, $member->getPoin());
        $stmt->bindValue(6, $member->getPlat_motor());
        $stmt->bindValue(7, $member->getPlat_mobil());
        $stmt->bindValue(8, $member->getPassword());
        $stmt->bindValue(9, "member");
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

?>