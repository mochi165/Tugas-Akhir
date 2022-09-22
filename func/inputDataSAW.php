<?php
    include 'config.php';
    $s = new mochi();
    $s -> dbconnect();
    $idTempat             = $_POST['idTempat'];
    $kriteriaKeamanan     = $_POST['kriteriaKeamanan'];
    $kriteriaKenyamanan   = $_POST['kriteriaKenyamanan'];
    $kriteriaAksesJalan   = $_POST['kriteriaAksesJalan'];
    $kriteriaJarak        = $_POST['kriteriaJarak'];

    $input = $s -> insert ("tablematrik VALUES (NULL,'$idTempat','$kriteriaKeamanan','$kriteriaKenyamanan','$kriteriaAksesJalan','$kriteriaJarak')");
    

    if ($input) {
        $bobot = array(0.25, 0.15, 0.30, 0.30);
          //Lakukan Normalisasi dengan rumus pada langkah 2
          //Cari Max atau min dari tiap kolom Matrik
          $crMax = $s -> query ("SELECT max(kriteriaKeamanan) as maxK1, 
                    max(kriteriaKenyamanan) as maxK2,
                    max(kriteriaAksesJalan) as maxK3,
                    max(kriteriaJarak) as maxK4
                    FROM tablematrik");
          $max = $s -> arr($crMax);

          $noo = 1;
          $sql3 = $s -> select(" tablematrik");
          while ($dt3 = $s -> arr($sql3)) {
            $rangking = round((($dt3['kriteriaKeamanan']/$max['maxK1'])*$bobot[0])+(($dt3['kriteriaKenyamanan']/$max['maxK2'])*$bobot[1])+(($dt3['kriteriaAksesJalan']/$max['maxK3'])*$bobot[2])+(($dt3['kriteriaJarak']/$max['maxK4'])*$bobot[3]),3);
            $status = $rangking;
              if ($status < 0.500){
                $status = 'Tidak Layak';
              } else {
                $status = 'Layak';
              }
          }
          $inputt = $s -> update ("dataevakuasi SET nilaiHasil='$rangking' WHERE idTempat = '$idTempat'");
        header("location:../?menu=saw");
    }else{
        echo "Gagal" ;
    }
?>

