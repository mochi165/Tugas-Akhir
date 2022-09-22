<?php
    include 'config.php';
    $s = new mochi();
    $s -> dbconnect();

    $kodeKecamatan  = $_POST['kodeKecamatan'];
    $namaBencana    = $_POST['namaBencana'];
    $lokasi         = $_POST['lokasi'];
    $waktu          = $_POST['waktu'];
    $lat            = $_POST['lat'];
    $long           = $_POST['long'];
    $totalKerugian  = $_POST['totalKerugian'];
    $ket            = $_POST['keterangan'];

    $input = $s -> insert ("databencana VALUES (NULL,'$kodeKecamatan','$namaBencana','$lokasi','$waktu','$lat','$long','$totalKerugian','$ket')");
    if ($input) {
        echo '<script>alert("Data Ditambah!");  window.history.back(); location.reload();  </script>';
    }else{
        echo '<script>alert("Error Mohon Coba Lagi!");  </script>';
    }

?>