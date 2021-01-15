<?php
class OwnerDaoImpl{
    public function fetchOwnerData(){
        $link = PDOUtil::createConnection();
        $query = "SELECT * FROM owner";
        $result = $link->query($query);
        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Owner');
        PDOUtil::closeConnection($link);
        return $result;
    }

    public function fetchOwner($id_owner){
        $link = PDOUtil::createConnection();
        $query = "SELECT * FROM owner WHERE id_owner = ?";
        $stmt = $link->prepare($query);
        $stmt->bindParam(1, $id_owner);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();
        PDOUtil::closeConnection($link);
        return $stmt->fetchObject('Owner');
    }
	
	public function fetchCabangData(){
        $link = PDOUtil::createConnection();
        $query = "SELECT * FROM cabang";
        $result = $link->query($query);
        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Cabang');
        PDOUtil::closeConnection($link);
        return $result;
    }
	
	public function fetchCabang($id_cabang){
        $link = PDOUtil::createConnection();
        $query = "SELECT * FROM cabang WHERE id_cabang = ?";
        $stmt = $link->prepare($query);
        $stmt->bindParam(1, $id_cabang);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();
        PDOUtil::closeConnection($link);
        return $stmt->fetchObject('Cabang');
    }
	
	public function fetchBahanBakarData(){
        $link = PDOUtil::createConnection();
        $query = "SELECT * FROM bahanbakar";
        $result = $link->query($query);
        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Bahanbakar');
        PDOUtil::closeConnection($link);
        return $result;
    }
	
    public function updatePegawai(Pegawai $pegawai){
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
	
	public function deletePegawai($id){
		$result = 0;
		$link = PDOUtil::createConnection();
		$query = "DELETE FROM pegawai WHERE id_pegawai = ?";
		$stmt = $link -> prepare($query);
		$stmt-> bindParam(1, $id);
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