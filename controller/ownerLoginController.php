<?php

class ownerLoginController{

    private $loginDao;
    private $pegawaiLoginDao;
    private $memberLoginDao;

    public function __construct(){
        $this->loginDao = new loginDaoImpl();
		$this->pegawaiLoginDao = new loginPegawaiDaoImpl();
		$this->memberLoginDao = new loginMemberDaoImpl();
    }

    public function index() {
        $sigInPressed = filter_input(INPUT_POST, 'btnSignIn');
        if($sigInPressed){
            $nip = filter_input(INPUT_POST, 'txtNip');
            $password = filter_input(INPUT_POST, 'txtPassword');
            $md5Password = md5($password);
            $login = new login();
            $login->setNip($nip);
            $login->setPassword($md5Password);
            $result=$this->loginDao->login($login);
			$result2=$this->pegawaiLoginDao->loginPegawai($login);
			$result3=$this->memberLoginDao->login($login);
            if($result != null && $result['nip'] == $nip){
                $_SESSION['my_session'] = true;
                $_SESSION['session_user'] = $result['nama_owner'];
                $_SESSION['session_role'] = $result['jabatan'];
                $_SESSION['isLoggedIn'] = true;
                header("location:index.php");
            } else if($result2 != null && $result2['nip'] == $nip){
                $_SESSION['my_session'] = true;
                $_SESSION['session_user'] = $result2['nama_pegawai'];
                $_SESSION['session_role'] = $result2['jabatan'];
                $_SESSION['isLoggedIn'] = true;
				header("location:index.php");
			} else if($result3 != null && $result3['id_member'] == $nip){
                $_SESSION['my_session'] = true;
                $_SESSION['session_user'] = $result3['nama_member'];
                $_SESSION['session_role'] = $result3['jabatan'];
                $_SESSION['isLoggedIn'] = true;
				header("location:index.php");
			}
			else{
                echo '<div class="bg-error">Invalid username or password</div>';
            }
        }
        include_once 'login_page.php';
    }

    public function logout(){
        session_unset();
        session_destroy();
        header("location:index.php");
    }
}