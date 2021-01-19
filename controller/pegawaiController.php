<?php

class pegawaiController{

    private $transaksiDao;
    private $memberDao;
    private $ownerDao;
    private $pegawaiDao;


    public function __construct()
    {
        $this->transaksiDao = new TransaksiDaoImpl();
        $this->memberDao = new MemberDaoImpl();
        $this->ownerDao = new OwnerDaoImpl();
        $this->pegawaiDao = new PegawaiDaoImpl();
    
    }

    public function index(){
        $pegId = filter_input(INPUT_GET, 'pegid');
		//hapus
        $command = filter_input(INPUT_GET, 'cmd');
        if(isset($command) && $command == 'del'){
            if(isset($pegId)){
                $result = $this->transaksiDao->deleteTransaksi($pegId);
				if ($result){
					echo '<div class="bg-success">Data successfully deleted</div>';
				} else {
					echo '<div class="bg-success">An error has occured</div>';
				}
            }
        }
        $result = $this->transaksiDao->fetchTransaksiData();
        include_once 'transaksi.php';
    }
    public function indexMem(){
        //tambah
		$submitPressed = filter_input(INPUT_POST,"btnSubmit");
		if($submitPressed){
            //Mengambil data
            $tanggalbeli = filter_input(INPUT_POST, "txtTanggalPembelian");
			$member = filter_input(INPUT_POST,"txtMember");
			$pegawai = filter_input(INPUT_POST,"txtPegawai");
			$bahanbakar = filter_input(INPUT_POST,"txtBahanBakar");
			$liter = filter_input(INPUT_POST,"txtLiter");
            $total_poin = filter_input(INPUT_POST,"txtTotalPoin");
            $rating = filter_input(INPUT_POST,"txtRating");

            $transaksi = new bertransaksi();
			$date = DateTime::createFromFormat('d/m/Y',$tanggalbeli);
			$d1 = $date->format("Y-m-d");
			$tgl_exp = date("Y-m-d", strtotime(date("Y-m-d", strtotime($tanggalbeli)) . " + 1 year"));
            $transaksi->setTanggal($d1);
            $transaksi->setId_member($member);
            $transaksi->setId_pegawai($pegawai);
            $transaksi->setId_bahanbakar($bahanbakar);
            $transaksi->setLiter($liter);
            $transaksi->setTot_poin($total_poin);
            $transaksi->setTanggal_exp_poin($tgl_exp);
            $transaksi->setRating($rating);
			
			
			$result = $this->transaksiDao->addTransaksi($transaksi);
			if ($result){
				echo '<div class="bg-success">Data successfully added (Employee : '.$member.')</div>';
			} else {
				echo '<div class="bg-error">Error Add Data</div>';
			}
		}
        $allMember = $this->memberDao->fetchMemberData();
        $allBahanBakar = $this->ownerDao->fetchBahanBakarData();
        $allPegawai = $this->pegawaiDao->fetchPegawaiData();
        $result = $this->transaksiDao->fetchTransaksiData();
		include_once './transaksi.php';
	}
	
	public function indexM(){
		$date = date('Y-m-d');
		$pegawai = $this->pegawaiDao->fetchPegawaiBulanan($date);
		include_once './month.php';
    }
    //Pembaharuan Projek
    public function indexAddMem(){
        //tambah
		$submitPressed = filter_input(INPUT_POST,"btnSubmit");
		if($submitPressed){
            //Mengambil data
            $idmember = filter_input(INPUT_POST, "txtIDMember");
			$nama = filter_input(INPUT_POST,"txtNamaMember");
			$email = filter_input(INPUT_POST,"txtEmailMember");
			$telepon = filter_input(INPUT_POST,"txtNoTelpMember");
            $pass = filter_input(INPUT_POST,"txtPasswordMember");
            $md5pass = md5($pass);

            $member = new member();
		    $member->setId_member($idmember);
            $member->setNama_member($nama);
            $member->setEmail($email);
            $member->setNo_telp($telepon);
            $member->setPassword($md5pass);
            
			
			$result = $this->memberDao->addMember($member);
			if ($result){
				echo '<div class="bg-success">Data successfully added (Member : '.$idmember.')</div>';
			} else {
				echo '<div class="bg-error">Error Add Data</div>';
			}
		}
        $result = $this->memberDao->fetchMemberData();
        include_once './data_member.php';
    }
}
