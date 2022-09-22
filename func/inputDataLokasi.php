<?php
    include 'config.php';
    $s = new mochi();
    $s -> dbconnect();


    $lokasi             = $_POST['namaTempat'];
    $alamat             = $_POST['alamat'];
    $kodeKecamatan      = $_POST['kodeKecamatan'];
    $lat                = $_POST['lat'];
    $lng                = $_POST['lng'];
    $ket                = $_POST['ket'];

    $input = $s -> insert ("dataevakuasi VALUES (NULL,'$lokasi','$alamat','$kodeKecamatan','$lat','$lng','','$ket')");

    if ($input) {
        header("location:../?menu=dataTempat");
    }else{
        echo "Gagal" ;
    }

?>

