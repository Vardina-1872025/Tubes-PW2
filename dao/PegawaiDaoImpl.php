<?php
class PegawaiDaoImpl{
    public function fetchPegawaiData(){
        $link = PDOUtil::createConnection();
        $query = "SELECT * FROM pegawai";
        $result = $link->query($query);
        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Pegawai');
        PDOUtil::closeConnection($link);
        return $result;
    }

    public function fetchPegawai($id_pegawai){
        $link = PDOUtil::createConnection();
        $query = "SELECT * FROM pegawai WHERE id_pegawai = ?";
        $stmt = $link->prepare($query);
        $stmt->bindParam(1, $id_pegawai);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();
        PDOUtil::closeConnection($link);
        return $stmt->fetchObject('Pegawai');
    }
    public function addPegawai(Pegawai $pegawai){
        $result = 0;
        $link = PDOUtil::createConnection();
        $query = "INSERT into pegawai (nama, nip, cabang) VALUES (?, ?, ?)";
        $stmt = $link->prepare($query);
        $stmt->bindValue(1, $pegawai->getNama_pegawai());
        $stmt->bindValue(2, $pegawai->getNip());
        $stmt->bindValue(3, $pegawai->getId_cabang());
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