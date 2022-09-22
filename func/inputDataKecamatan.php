<?php
    include 'config.php';
    $s = new mochi();
    $s -> dbconnect();

    $ekstensi_diperbolehkan = array('geojson');
    $nama = $_FILES['file']['name'];
    $x = explode('.', $nama);
    $ekstensi = strtolower(end($x));
    $ukuran = $_FILES['file']['size'];
    $file_tmp = $_FILES['file']['tmp_name'];

    $namaKecamatan      = $_POST['namaKecamatan'];
    $kodeKecamatan      = $_POST['kodeKecamatan'];
    $jumlahDesa         = $_POST['jumlahDesa'];
    $warnaKecamatan     = $_POST['warnaKecamatan'];
    $ketKecamatan       = $_POST['ketKecamatan'];    

    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
        if($ukuran < 13374269){          
            move_uploaded_file($file_tmp, '../assets/geojson/'.$nama);
            $input = $s -> insert ("datakecamatan VALUES (NULL,'$kodeKecamatan','$namaKecamatan','$jumlahDesa','$nama','$warnaKecamatan','$ketKecamatan')");
            if($input){
                echo "<script>alert('Data Ditambah!'); window.history.back(); location.href='?menu=rekapDataBencana'; </script>";
            }else{
                echo 'GAGAL MENGUPLOAD GAMBAR';
            }
        }else{
            echo 'UKURAN FILE TERLALU BESAR';
        }
    }else{
        echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
    }
?>