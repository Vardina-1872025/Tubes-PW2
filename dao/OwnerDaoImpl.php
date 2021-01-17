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
	
	public function addCabang(Cabang $cbg){
		$result=0;
		$link = PDOUtil::createConnection();
		$query = "INSERT INTO cabang (id_cabang,nama_cabang,alamat,no_telp_cabang,id_owner) VALUES (?,?,?,?,?)";
		$stmt = $link->prepare($query);
		$stmt->bindValue(1, $cbg->getId_cabang());
		$stmt->bindValue(2, $cbg->getNama_cabang());
        $stmt->bindValue(3, $cbg->getAlamat());
        $stmt->bindValue(4, $cbg->getNo_telp_cabang());
		$stmt->bindValue(5, $cbg->getId_owner());
		$link->beginTransaction();
		if($stmt->execute()){
			$link->commit();
			$result=1;
		} else {
			$link->rollBack();
		}
		PDOUtil::closeConnection($link);
		return $result;
	}

	public function updateCabang(Cabang $cbg){
        $result = 0;
        $link = PDOUtil::createConnection();
        $query = "UPDATE cabang SET nama_cabang = ?, alamat = ?, no_telp_cabang = ? WHERE id_cabang = ?";
        $stmt = $link->prepare($query);
        $stmt->bindValue(1, $cbg->getNama_cabang());
        $stmt->bindValue(2, $cbg->getAlamat());
        $stmt->bindValue(3, $cbg->getNo_telp_cabang());
        $stmt->bindValue(4, $cbg->getId_cabang());
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
	
	public function deleteCabang($id){
		$result = 0;
		$link = PDOUtil::createConnection();
		$query = "DELETE FROM cabang WHERE id_cabang = ?";
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
        $query = "UPDATE pegawai SET nama_pegawai = ?, nip = ?, id_cabang = ? WHERE id_pegawai = ?";
        $stmt = $link->prepare($query);
        $stmt->bindValue(1, $pegawai->getNama_pegawai());
        $stmt->bindValue(2, $pegawai->getNip());
        $stmt->bindValue(3, $pegawai->getId_cabang());
        $stmt->bindValue(4, $pegawai->getId_pegawai());
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