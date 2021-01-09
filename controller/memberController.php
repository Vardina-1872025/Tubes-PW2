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
                $link = new PDO("mysql:host=localhost; dbname=tubespw2", "root", "");
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
            $plat = filter_input(INPUT_POST, "txtPlat");
            $tipe = filter_input(INPUT_POST, "txtTipe");

            // Conect ke db
            $member = new member();
            $member->setPlat_kendaraan($plat);
            $member->setTipe_kendaraan($tipe);

            $result = $this->memberDao->addMember($member);
            if($result){
                echo '<div class="bg-success">Data successfully added (artists: ' . $plat . ')</div>';
            } else{
                echo '<div class="bg-error">Error add data</div>';
            }
        }
        $result = $this->memberDao->fetchMemberData();
        include_once 'kendaraan.php';
    }
}