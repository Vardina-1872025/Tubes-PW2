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
		$cabId = filter_input(INPUT_GET, 'cabid');
		//hapus
        $command = filter_input(INPUT_GET, 'cmd');
        if(isset($command) && $command == 'del'){
            if(isset($cabId)){
                $result = $this->ownerDao->deleteCabang($cabId);
				if ($result){
					echo '<div class="bg-success">Data successfully deleted</div>';
				} else {
					echo '<div class="bg-success">An error has occured</div>';
				}
            }
        }
		//tambah
		$submitPressed = filter_input(INPUT_POST,"btnSubmit");
		if($submitPressed){
			//Mengambil data
			$idcab = filter_input(INPUT_POST,"txtIdCab");
			$nama = filter_input(INPUT_POST,"txtNama");
			$alamat = filter_input(INPUT_POST,"txtAlamat");
			$telp= filter_input(INPUT_POST,"txtTelp");
			$owner= filter_input(INPUT_POST,"txtOwner");
			
			$acab = new Cabang();
			$acab->setId_cabang($idcab);
			$acab->setNama_cabang($nama);
			$acab->setAlamat($alamat);
			$acab->setNo_telp_cabang($telp);
			$acab->setId_owner($owner);
			
			$result = $this->ownerDao->addCabang($albums);
			if ($result){
				echo '<div class="bg-success">Data successfully added (Title : '.$title.')</div>';
			} else {
				echo '<div class="bg-error">Error Add Data</div>';
			}
		}
		$result = $this->ownerDao->fetchCabangData();
		$allOwner = $this->ownerDao->fetchOwnerData();
		include_once 'cabang.php';
	}
	
	public function indexUC(){
		//update
        $cabId = filter_input(INPUT_GET, 'cabid');
        if(isset($cabId)){
            $cabang = $this->ownerDao->fetchCabang($cabId);
        }
		
		$submitPressed = filter_input(INPUT_POST,"btnSubmit");
		if($submitPressed){
			//Mengambil data
			$nama = filter_input(INPUT_POST,"txtNama");
			$alamat = filter_input(INPUT_POST,"txtAlamat");
			$telp= filter_input(INPUT_POST,"txtTelp");
			$owner= filter_input(INPUT_POST,"txtOwner");
			
			$ucab = new Cabang();
			$ucab->setId_cabang($cabang->getId_cabang());
			$ucab->setNama_cabang($nama);
			$ucab->setAlamat($alamat);
			$ucab->setNo_telp_cabang($telp);
			$ucab->setId_owner($owner);
			
			$this->ownerDao->updateCabang($ucab);
			header("location:index.php?navito=cabang");
		}
		$allOwner = $this->ownerDao->fetchOwnerData();
		include_once './update_cabang.php';
	}
	
	public function indexB(){
		$result = $this->ownerDao->fetchBahanBakarData();
		include_once 'bahanbakar.php';
	}
}