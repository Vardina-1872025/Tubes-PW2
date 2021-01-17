<?php
class TransaksiDaoImpl{
    public function fetchTransaksiData(){
        $link = PDOUtil::createConnection();
        $query = "SELECT * FROM bertransaksi";
        $result = $link->query($query);
        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'bertransaksi');
        PDOUtil::closeConnection($link);
        return $result;
    }

    public function fetchTransaksi($id_pegawai){
        $link = PDOUtil::createConnection();
        $query = "SELECT * FROM bertransaksi WHERE id_transaksi = ?";
        $stmt = $link->prepare($query);
        $stmt->bindParam(1, $id_transaksi);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();
        PDOUtil::closeConnection($link);
        return $stmt->fetchObject('bertransaksi');
    }
    public function addTransaksi(bertransaksi $transaksi){
        $result = 0;
        $link = PDOUtil::createConnection();
        $query = "INSERT into bertransaksi (tanggal, id_member, id_pegawai, id_bahanbakar, liter, tot_poin, tanggal_exp_poin, rating) VALUES  (?, ?, ?,?,?,?,?,?)";
        $stmt = $link->prepare($query);
        // $stmt->bindValue(1, $transaksi->getId_transaksi());
        $stmt->bindValue(1, $transaksi->getTanggal());
        $stmt->bindValue(2, $transaksi->getId_member());
        $stmt->bindValue(3, $transaksi->getId_pegawai());
        $stmt->bindValue(4, $transaksi->getId_bahanbakar());
        $stmt->bindValue(5, $transaksi->getLiter());
        $stmt->bindValue(6, $transaksi->getTot_poin());
        $stmt->bindValue(7, $transaksi->getTanggal_exp_poin());
        $stmt->bindValue(8, $transaksi->getRating());
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

    public function deleteTransaksi($id){
		$result = 0;
		$link = PDOUtil::createConnection();
		$query = "DELETE FROM bertransaksi WHERE id_transaksi = ?";
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