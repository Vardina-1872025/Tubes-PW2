<?php

class memberController{

    private $memberDao;

    public function __construct()
    {
        $this->memberDao = new MemberDaoImpl;
    }

    public function index(){
        $artid = filter_input(INPUT_GET, 'artid');
        if(isset($artid)){
            $member = $this->memberDao->fetchMember($artid);
        }
        $command = filter_input(INPUT_GET, 'cmd');
        if(isset($command) && $command == 'del'){
            $artid = filter_input(INPUT_GET, 'artid');
            if(isset($artid)){
                $link = new PDO("mysql:host=localhost; dbname=pw2tubes", "root", "");
                $link->setAttribute(PDO::ATTR_AUTOCOMMIT, false);
                $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $query = "DELETE FROM member WHERE id_member = ?";
                $stmt = $link -> prepare($query);
                $stmt-> bindParam(1, $artid);
                $link->beginTransaction();
                if($stmt->execute()){
                    $link->commit();
                } else{
                    $link->rollBack();
                }
                $link = null;
                echo '<div class="bg-success">Data successfully deleted </div>';
            }
        }

        $submitPressed = filter_input(INPUT_POST, "btnSubmit");
        if(isset($submitPressed)) {
            // Get Data dari Form
            $idmember = filter_input(INPUT_POST, "txtIdMember");
            $plat_motor = filter_input(INPUT_POST, "txtPlatMotor");
            $plat_mobil = filter_input(INPUT_POST, "txtPlatMobil");
            

            // Conect ke db
            $member = new member();
            $member->setId_member($idmember);
            $member->setPlat_motor($plat_motor);
            $member->setPlat_mobil($plat_mobil);
            

            $result = $this->memberDao->addMember($member);
            if($result){
                echo '<div class="bg-success">Data successfully added (artists: ' . $plat_motor . ')</div>';
            } else{
                echo '<div class="bg-error">Error add data</div>';
            }
        }
        $result = $this->memberDao->fetchMemberData();
        include_once 'kendaraan.php';
    }
    public function indexUK(){
		//update
        $cabId = filter_input(INPUT_GET, 'cabid');
        if(isset($cabId)){
            $kendaraan = $this->memberDao->fetchMember($cabId);
        }
		
		$submitPressed = filter_input(INPUT_POST,"btnSubmit");
		if($submitPressed){
			//Mengambil data
            $plat_motor = filter_input(INPUT_POST,"txtPlatMotor");
            $plat_mobil = filter_input(INPUT_POST,"txtPlatMobil");
			
			$uken = new Member();
            $uken->setPlat_motor($plat_motor);
            $uken->setPlat_mobil($plat_mobil);
            $uken->setId_member($_SESSION['session_id']);
			
			$this->memberDao->updateKendaraan($uken);
			header("location:index.php?navito=kendaraan");
		}
		$allKendaraan = $this->memberDao->fetchMemberData();
		include_once './update_kendaraan.php';
	}
}