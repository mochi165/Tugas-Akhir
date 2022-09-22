<?php 
session_start();
if (!isset($_SESSION['id_user'])){
echo"<script>alert('Login Dulu')</script>";
echo"<meta http-equiv='refresh' content='0;url=login.php'>";
}
?>
<!DOCTYPE html>
<html lang="jv">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="<?php echo $s->URL(); ?>/assets/image/logo.png" >
    <!-- Title Page-->
    <title>
    Grizzly Pedia
        <?php
         if (isset($_GET['menu'])) {
            if ($_GET['menu']=='dashboard') {
                echo " | Dashboard;";
            } elseif ($_GET['menu']=='rekapDataBencana') {
                echo " &nbsp; | Data Bencana";
            } elseif ($_GET['menu']=='dataKecamatan') {
                echo " &nbsp; | Data Kecamatan";
            } elseif ($_GET['menu']=='saw') {
                echo " &nbsp; | Data Lokasi Evakuasi";
            } elseif ($_GET['menu']=='lf-lg') {
                echo " &nbsp; | Peta Kecamatan";
            } elseif ($_GET['menu']=='lf-marker') {
                echo " &nbsp; | Peta Marker BEncana";
            } elseif ($_GET['menu']=='lf-cluster') {
                echo " &nbsp; | Peta Cluster BEncana";
            } elseif ($_GET['menu']=='lf-heatmap') {
                echo " &nbsp; | Peta heatmap BEncana";
            } elseif ($_GET['menu']=='lf-choroplet') {
                echo " &nbsp; | Peta choroplet BEncana";
            } elseif ($_GET['menu']=='lf-rute') {
                echo " &nbsp; | Peta Rute BEncana";
            } else {
                echo " PAGE NOT FOUND !!!";
            }
        }

        $id_user = $_SESSION['id_user'];
        $user = $s -> select ("user where id_user ='$id_user'");
        $data_user = $s -> arr ($user);
        ?>
    </title>

    <!-- Custom fonts-->
    <link href="<?php echo $s->URL(); ?>/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles -->
    <link href="<?php echo $s->URL(); ?>/assets/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="<?php echo $s->URL(); ?>/assets/css/custom.css" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="<?php echo $s->URL(); ?>/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="<?php echo $s->URL(); ?>/assets/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Leaflet -->
    <link rel="stylesheet" href="<?php echo $s->URL(); ?>/assets/leaflet/leaflet.css" />
    <link rel="stylesheet" href="<?php echo $s->URL(); ?>/assets/js/leaflet-panel-layers-master/src/leaflet-panel-layers.css" />
    
    <script src="<?php echo $s->URL(); ?>/assets/leaflet/leaflet.js"></script>
    <script src="<?php echo $s->URL(); ?>/assets/js/leaflet.ajax.js"></script>
    <script src="<?php echo $s->URL(); ?>/assets/js/leaflet-panel-layers-master/src/leaflet-panel-layers.js"></script>

    <!-- online -->
    <script src="//code.jquery.com/jquery-1.9.1.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo $s->URL(); ?>">
                <div class="sidebar-brand-text mx-3">Grizzly Pedia</div>
            </a>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <!-- Nav Item - Dashboard -->
            <li class="nav-item ">
                <a class="nav-link" href="<?php echo $s->URL(); ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Heading -->
            <div class="sidebar-heading">
                Data
            </div>
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseZero"
                    aria-expanded="true" aria-controls="collapseZero">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Data Master</span>
                </a>
                <div id="collapseZero" class="collapse" aria-labelledby="headingZero" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Data Master:</h6>
                        <a class="collapse-item" href="?menu=dataKecamatan">Data Kecamatan</a>
                        <a class="collapse-item" href="?menu=rekapDataBencana">Data Bencana</a>
                        <a class="collapse-item" href="?menu=dataTempat">Data Tempat Evakuasi</a>
                    </div>
                </div>
            </li>
            <!-- <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne"
                    aria-expanded="true" aria-controls="collapseOne">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Data Bencana</span>
                </a>
                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Data Bencana:</h6>
                        <a class="collapse-item" href="?menu=rekapDataBencana">Rekap Data Bencana</a>
                    </div>
                </div>
            </li> -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Rute SAW</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Rute:</h6>
                        <a class="collapse-item" href="?menu=saw">Data Tempat Evakuasi</a>
                        <a class="collapse-item" href="?menu=lf-rute">Peta-Rute</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Peta Bencana</span>
                </a>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Peta:</h6>
                        <a class="collapse-item" href="?menu=lf-lg">Peta Kecamatan</a>
                        <a class="collapse-item" href="?menu=lf-marker">Peta-marker</a>
                        <a class="collapse-item" href="?menu=lf-cluster">Peta-cluster</a>
                        <a class="collapse-item" href="?menu=lf-heatmap">Peta-heatmap</a>
                        <a class="collapse-item" href="?menu=lf-choroplet">Peta-choroplet</a>
                        
                        <!-- <a class="collapse-item" href="?menu=lf-test">Peta-test</a> -->
                    </div>
                </div>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <div class="topbar-divider d-none d-sm-block"></div>
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"> <?php echo $data_user['nama_user'] ; ?></span>
                                <img class="img-profile rounded-circle"
                                    src="<?php echo $s->URL(); ?>/assets/image/logo.png">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- End of Topbar -->