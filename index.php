<?php
    include './func/config.php';
    $s = new mochi();
    $s -> dbconnect();
    
    require_once ('./func/header.php');
    if (isset($_GET['menu'])) {
        if ($_GET['menu']=='dashboard') {
            require_once "content/dashboard.php";
        } elseif ($_GET['menu']=='login') {
            require_once "content/login.php";
        } elseif ($_GET['menu']=='dataBencana') {
            require_once "content/dataBencana.php";
        } elseif ($_GET['menu']=='dataKecamatan') {
            require_once "content/dataKecamatan.php";
        } elseif ($_GET['menu']=='rekapDataBencana') {
            require_once "content/rekapDataBencana.php";
        } elseif ($_GET['menu']=='delete') {
            require_once "func/delete.php";
        } elseif ($_GET['menu']=='editKecamatan') {
            require_once "content/editKecamatan.php";
        } elseif ($_GET['menu']=='editBencana') {
            require_once "content/editBencana.php";
        } elseif ($_GET['menu']=='editRekapBencana') {
            require_once "content/editRekapBencana.php";
        } elseif ($_GET['menu']=='dataTempat') {
            require_once "content/dataTempat.php";
        } elseif ($_GET['menu']=='editTempat') {
            require_once "content/editTempat.php";
        } elseif ($_GET['menu']=='saw') {
            require_once "content/saw.php";
        } elseif ($_GET['menu']=='editSaw') {
            require_once "content/editSaw.php";
        } elseif ($_GET['menu']=='lf-lg') {
            require_once "content/leaflet.php";
        } elseif ($_GET['menu']=='lf-marker') {
            require_once "content/leaflet-marker.php";
        } elseif ($_GET['menu']=='lf-cluster') {
            require_once "content/leaflet-cluster.php";
        } elseif ($_GET['menu']=='lf-heatmap') {
            require_once "content/leaflet-heatmap.php";
        } elseif ($_GET['menu']=='lf-choroplet') {
            require_once "content/leaflet-choroplet.php";
        } elseif ($_GET['menu']=='lf-test') {
            require_once "content/test.php";
        } elseif ($_GET['menu']=='lf-rute') {
            require_once "content/routing.php";
        } else {
                 
            echo " <center><h1 style='color : #088080;'> PAGE NOT FOUND   </h1></center>";
        }
    } else {
        require_once 'content/dashboard.php';
        // echo " <center><h1 style='color : #080880; margin-bottom:320px; margin-top:100px;'> INI DASHBOARD   </h1></center>";
    }
    include './func/footer.php' ;
?>