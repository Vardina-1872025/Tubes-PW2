<?php
session_start();
include_once 'entity/Albums.php';
include_once 'entity/Artists.php';
include_once 'entity/login.php';
include_once 'entity/pegawaiLogin.php';
include_once 'entity/pegawai.php';
include_once 'entity/cabang.php';
include_once 'entity/owner.php';
include_once 'entity/member.php';
include_once 'entity/bahanbakar.php';
include_once 'entity/memberLogin.php';
include_once 'entity/bertransaksi.php';
include_once 'controller/ownerLoginController.php';
include_once 'controller/ownerController.php';
include_once 'controller/pegawaiController.php';
include_once 'controller/pegawaiView.php';
include_once 'controller/memberView.php';
include_once 'controller/memberController.php';
include_once 'controller/artistsController.php';
include_once 'controller/albumsController.php';
include_once 'controller/artistsUpdateController.php';
include_once 'controller/albumsUpdateController.php';
include_once 'dao/AlbumsDaoImpl.php';
include_once 'dao/ArtistsDaoImpl.php';
include_once 'dao/loginDaoImpl.php';
include_once 'dao/loginPegawaiDaoImpl.php';
include_once 'dao/loginMemberDaoImpl.php';
include_once 'dao/PegawaiDaoImpl.php';
include_once 'dao/OwnerDaoImpl.php';
include_once 'dao/MemberDaoImpl.php';
include_once 'dao/TransaksiDaoImpl.php';
include_once 'util/PDOUtil.php';
include_once 'db_function/artists_function.php';
include_once 'db_function/albums_function.php';
include_once 'db_function/loginOwner_function.php';
include_once 'db_function/loginPegawai_function.php';
if(!isset($_SESSION['my_session'])){
    $_SESSION['my_session'] = false;
}
if(!isset($_SESSION['isLoggedIn'])){
    $_SESSION['isLoggedIn'] = false;
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Colorlib Templates">
        <meta name="author" content="Colorlib">
        <meta name="keywords" content="Colorlib Templates">
        <link rel="icon" href="images/Logo.png">
        <title>Pertamina ANS</title>

        <!-- Icons font CSS-->
        <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
        <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
        <!-- Font special for pages-->
        <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

        <!-- Vendor CSS-->
        <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
        <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

		<link rel="stylesheet" type="text/css" href="css/theme1.css"/>
        <link rel="stylesheet" type="text/css" href="css/web_style.css">
        <link rel="stylesheet" type="text/css" href="css/datatables.css">
        <link rel="stylesheet" type="text/css" href="css/login_style.css">
		<link rel="stylesheet" type="text/css" href="css/demo.css"/>
        <script type="text/javascript" src="js/functional_js.js"></script>
        <script type="text/javascript" src="command_script.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.5.1/moment.min.js"></script>
    </head>
    <body>
        
        <header>
            <div style="padding-top:10px">
            <img src="images/logo.png" style="width:150px">
            <h1 style="color:white;margin-top:-30px;margin-bottom:20px">Pertamina ANS</h1><div>
            
        <!--Tag for header--></h1>
        </header>
        <!--Tag for navigation-->
        <nav>
            <ul>
                <li><a href="?navito=home">Home</a></li>
                <?php if($_SESSION['isLoggedIn'] && $_SESSION['session_role']=='owner'){ ?>
                    <div class="dropdown">
                        <button class="dropbtn">Data Pegawai 
                        <i class="fa fa-caret-down"></i>
                        </button>
                        <div class="dropdown-content">
						<a href="?navito=viewpegawai">Olah Data Pegawai</a>
                        <a href="?navito=cabang">Olah Data Cabang</a>
                        </div>
                    </div> 
                    <div class="dropdown">
                        <button class="dropbtn">Data Bahan Bakar 
                        <i class="fa fa-caret-down"></i>
                        </button>
                        <div class="dropdown-content">
                        <a href="?navito=bahanbakar">Olah Data Bahan Bakar</a>
                        <a href="#">Laporan Keuntungan</a>
                        </div>
                    </div>
				<?php } else if($_SESSION['isLoggedIn'] && $_SESSION['session_role']=='pegawai'){?>
					<div class="dropdown">
                        <button class="dropbtn">Transaksi
                        <i class="fa fa-caret-down"></i>
                        </button>
                        <div class="dropdown-content">
                        <a href="?navito=transaksi">Input Data Transaksi</a>
                        <a href="?navito=viewtransaksi">View Data Transaksi</a>
                        </div>
                    </div> 
                    <div class="dropdown">
                        <button class="dropbtn">View Data 
                        <i class="fa fa-caret-down"></i>
                        </button>
                        <div class="dropdown-content">
                        <a href="?navito=viewmember">Member</a>
                        <a href="#">Employee Of The Month</a>
                        </div>
                    </div>
                <?php } else if($_SESSION['isLoggedIn'] && $_SESSION['session_role']=='member'){?>
					<li><a href="?navito=kendaraan">Data Kendaraan</a></li>
                    <li><a href="?navito=reminder">Reminder</a></li>
                    <li><a href="?navito=#">Tukar Poin</a></li>
				<?php } ?>
                <?php if($_SESSION['isLoggedIn']){ ?>
                <li><a href="?navito=logout">Logout</a></li>
                <?php } ?>  
            </ul>
        </nav>
        <div style="clear:both;"></div>
        <!--Tag for content-->
        <main class="pembulat">
            <?php
            $nav = filter_input(INPUT_GET, "navito");
            if($_SESSION['my_session']){
                switch ($nav){
                    case 'home':
                        include_once './home.php';
                    break;
                }
            }
            switch ($nav) {
                case 'artists':
                    $ArtistsController = new artistsController();
                    $ArtistsController->index();
                    break;
                case 'albums':
                    $AlbumsController = new albumsController();
                    $AlbumsController->index();
                    break;
                case 'transaksi':
                    $pegawaiController = new pegawaiController();
                    $pegawaiController->index();
                    break;
                case 'pegawai':
                    $ownerController = new ownerController();
                    $ownerController->indexUPeg();
                    break;
                case 'kendaraan':
                    $memberController = new memberController();
                    $memberController->index();
                    break;
				case 'cabang':
                    $ownerController = new ownerController();
                    $ownerController->indexC();
                    break;
				case 'cabu':
                    $ownerController = new ownerController();
                    $ownerController->indexUC();
                    break;
                case 'uken':
                    $memberController = new memberController();
                    $memberController->indexUK();
                    break;
				case 'ubbm':
                    $ownerController = new ownerController();
                    $ownerController->indexUB();
                    break;
				case 'bahanbakar':
                    $ownerController = new ownerController();
                    $ownerController->indexB();
                    break;
                case 'artu':
                    $ArtistsUpdateController = new artistsUpdateController();
                    $ArtistsUpdateController->index();
                    break;
                case 'albu':
                    $AlbumsUpdateController = new albumsUpdateController();
                    $AlbumsUpdateController->index();
                    break;
                case 'logout':
                    $ownerLoginController = new ownerLoginController();
                    $ownerLoginController->logout();
                    break;
                case 'viewtransaksi':
                    $pegawaiViewController = new pegawaiViewController();
                    $pegawaiViewController->index();
                    break;
                case 'viewmember':
                    $memberViewController = new memberViewController();
                    $memberViewController->index();
					break;
				case 'viewpegawai':
                    $ownerController = new ownerController();
                    $ownerController->index();
					break;
                default:
                    {
                        if($_SESSION['isLoggedIn']){
                            include_once 'home.php';
                        }
                        else{
                            $ownerLoginController = new ownerLoginController();
                            $ownerLoginController->index();
                        }
                    }
            }
            ?>
        </main>
        <!--Tag for footer-->
        <footer>
            Created by 1872025, 1872043, 1872045
        </footer>

        <!-- Jquery JS-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <!-- Vendor JS-->
        <script src="vendor/select2/select2.min.js"></script>
        <script src="vendor/datepicker/moment.min.js"></script>
        <script src="vendor/datepicker/daterangepicker.js"></script>

        <!-- Main JS-->
        <script src="js/global.js"></script>

        <!-- Datatable -->
        <script type="text/javascript" src="js/datatables.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $('#tableId').DataTable();
            });
        </script>
        <?php
        ?>
    </body>
</html>
