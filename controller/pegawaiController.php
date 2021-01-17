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

        $submitPressed = filter_input(INPUT_POST, "btnSubmit");
        // if(isset($submitPressed)) {
        //     // Get Data dari Form
        //     $nama = filter_input(INPUT_POST, "txtNama");
        //     $nip = filter_input(INPUT_POST, "txtNip");
        //     $cabang = filter_input(INPUT_POST, "txtCabang");

        //     // Conect ke db
        //     $pegawai = new pegawai();
        //     $pegawai->setNama_pegawai($nama);
        //     $pegawai->setNip($nip);
        //     $pegawai->setId_cabang($cabang);

        //     $result = $this->pegawaiDao->addPegawai($pegawai);
        //     if($result){
        //         echo '<div class="bg-success">Data successfully added (artists: ' . $nama . ')</div>';
        //     } else{
        //         echo '<div class="bg-error">Error add data</div>';
        //     }
        // }
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
            $tgl_exp = filter_input(INPUT_POST,"txtTanggalExp");
            $rating = filter_input(INPUT_POST,"txtRating");

            $transaksi = new bertransaksi();
            $d1 = date('%Y-%m-%d',(strtotime($tanggalbeli)));
            //$penampung = DATE_FORMAT(date_create($tanggalbeli),'YYYY-MM-DD');
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
}