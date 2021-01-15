<?php

class ownerController{

    private $pegawaiDao;
    private $ownerDao;

    public function __construct()
    {
        $this->pegawaiDao = new PegawaiDaoImpl;
        $this->ownerDao = new OwnerDaoImpl;
    }

    public function index(){
		//update
        $artid = filter_input(INPUT_GET, 'artid');
        if(isset($artid)){
            $pegawai = $this->pegawaiDao->fetchPegawai($artid);
        }
		//hapus
        $command = filter_input(INPUT_GET, 'cmd');
        if(isset($command) && $command == 'del'){
            if(isset($artid)){
                $result = $this->ownerDao->deletePegawai($artid);
				if ($result){
					echo '<div class="bg-success">Data successfully deleted</div>';
				} else {
					echo '<div class="bg-success">An error has occured</div>';
				}
            }
        }
		
        $result = $this->pegawaiDao->fetchPegawaiData();
        include_once 'pegawai.php';
    }
	
	public function indexC(){
		//input
        $submitPressed = filter_input(INPUT_POST, "btnSubmit");
        if(isset($submitPressed)) {
            // Get Data dari Form
            $nama = filter_input(INPUT_POST, "txtNama");
            $nip = filter_input(INPUT_POST, "txtNip");
            $cabang = filter_input(INPUT_POST, "txtCabang");

            // Conect ke db
            $pegawai = new pegawai();
            $pegawai->setNama_pegawai($nama);
            $pegawai->setNip($nip);
            $pegawai->setId_cabang($cabang);

            $result = $this->pegawaiDao->addPegawai($pegawai);
            if($result){
                echo '<div class="bg-success">Data successfully added (artists: ' . $nama . ')</div>';
            } else{
                echo '<div class="bg-error">Error add data</div>';
            }
        }
		$result = $this->ownerDao->fetchCabangData();
		$allOwner = $this->ownerDao->fetchOwnerData();
		include_once 'cabang.php';
	}
	
	public function indexP(){
		$result = $this->pegawaiDao->fetchPegawaiData();
		include_once 'view_pegawai.php';
	}
}