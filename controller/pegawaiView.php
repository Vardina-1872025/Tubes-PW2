<?php

class pegawaiViewController{

    private $transaksiDao;

    public function __construct()
    {
        $this->transaksiDao = new TransaksiDaoImpl;
    }

    public function index(){
        $artid = filter_input(INPUT_GET, 'artid');
        if(isset($artid)){
            $transaksi = $this->transaksiDao->fetchTransaksi($artid);
        }
        // $command = filter_input(INPUT_GET, 'cmd');
        // if(isset($command) && $command == 'del'){
        //     $artid = filter_input(INPUT_GET, 'artid');
        //     if(isset($artid)){
        //         $link = new PDO("mysql:host=localhost; dbname=tubespw2", "root", "");
        //         $link->setAttribute(PDO::ATTR_AUTOCOMMIT, false);
        //         $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //         $query = "DELETE FROM bertransaksi WHERE id_transaksi = ?";
        //         $stmt = $link -> prepare($query);
        //         $stmt-> bindParam(1, $artid);
        //         $link->beginTransaction();
        //         if($stmt->execute()){
        //             $link->commit();
        //         } else{
        //             $link->rollBack();
        //         }
        //         $link = null;
        //         echo '<div class="bg-success">Data successfully deleted </div>';
        //     }
        // }

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
        include_once 'view_transaksi.php';
    }
}