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
        $pegId = filter_input(INPUT_GET, 'pegid');
		//hapus
        $command = filter_input(INPUT_GET, 'cmd');
        if(isset($command) && $command == 'del'){
            if(isset($pegId)){
                $result = $this->ownerDao->deletePegawai($pegId);
				if ($result){
					echo '<div class="bg-success">Data successfully deleted</div>';
				} else {
					echo '<div class="bg-success">An error has occured</div>';
				}
            }
        }
        $result = $this->pegawaiDao->fetchPegawaiData();
        include_once 'view_pegawai.php';
    }
	
	public function indexUPeg(){
		//update
        $pegId = filter_input(INPUT_GET, 'pegid');
        if(isset($pegId)){
            $pegawai = $this->pegawaiDao->fetchPegawai($pegId);
        }
		
		$submitPressed = filter_input(INPUT_POST,"btnSubmit");
		if($submitPressed){
			//Mengambil data
			$nama = filter_input(INPUT_POST,"txtNama");
			$nip = filter_input(INPUT_POST,"txtNip");
			$cabang= filter_input(INPUT_POST,"txtCabang");
			
			$upeg = new pegawai();
			$upeg->setId_pegawai($pegawai->getId_pegawai());
			$upeg->setNama_pegawai($nama);
			$upeg->setNip($nip);
			$upeg->setId_cabang($cabang);
			
			$this->ownerDao->updatePegawai($upeg);
			header("location:index.php?navito=viewpegawai");
		}
		$allCabang = $this->ownerDao->fetchCabangData();
		include_once './pegawai.php';
	}
	
	public function indexC(){
		//update
        $pegId = filter_input(INPUT_GET, 'pegid');
        if(isset($pegId)){
            $pegawai = $this->ownerDao->fetchCabang($pegId);
        }
		//hapus
        $command = filter_input(INPUT_GET, 'cmd');
        if(isset($command) && $command == 'del'){
            if(isset($pegId)){
                $result = $this->ownerDao->deleteCabang($pegId);
				if ($result){
					echo '<div class="bg-success">Data successfully deleted</div>';
				} else {
					echo '<div class="bg-success">An error has occured</div>';
				}
            }
        }
		$result = $this->ownerDao->fetchCabangData();
		$allOwner = $this->ownerDao->fetchOwnerData();
		include_once 'cabang.php';
	}
	
	public function indexUC(){
		//update
        $pegId = filter_input(INPUT_GET, 'pegid');
        if(isset($pegId)){
            $pegawai = $this->pegawaiDao->fetchPegawai($pegId);
        }
		
		$submitPressed = filter_input(INPUT_POST,"btnSubmit");
		if($submitPressed){
			//Mengambil data
			$nama = filter_input(INPUT_POST,"txtNama");
			$nip = filter_input(INPUT_POST,"txtNip");
			$cabang= filter_input(INPUT_POST,"txtCabang");
			
			$upeg = new pegawai();
			$upeg->setId_pegawai($pegawai->getId_pegawai());
			$upeg->setNama_pegawai($nama);
			$upeg->setNip($nip);
			$upeg->setId_cabang($cabang);
			
			$this->ownerDao->updatePegawai($upeg);
			header("location:index.php?navito=viewpegawai");
		}
		$allCabang = $this->ownerDao->fetchCabangData();
		include_once './pegawai.php';
	}
	
	public function indexB(){
		$result = $this->ownerDao->fetchBahanBakarData();
		include_once 'bahanbakar.php';
	}
}