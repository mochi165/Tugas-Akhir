<?php
    $idMatrik = $_GET['idMatrik'];
    $select=$s -> select("tablematrik inner join dataevakuasi on dataevakuasi.idTempat=tablematrik.idTempat where idMatrik='$idMatrik'");
    $data=$s -> arr($select);

    if (isset($_POST['simpan'])) {
      $update= $s -> update ("tablematrik SET 
          idTempat            = '$_POST[idTempat]',
          kriteriaKeamanan    = '$_POST[kriteriaKeamanan]',
          kriteriaKenyamanan  = '$_POST[kriteriaKenyamanan]',
          kriteriaAksesJalan  = '$_POST[kriteriaAksesJalan]',
          kriteriaJarak       = '$_POST[kriteriaJarak]'
          
          WHERE idMatrik ='$_POST[idMatrik]'");

          if ($update) {
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
              $idTempat = $_POST['idTempat'];
              $inputt = $s -> update ("dataevakuasi SET nilaiHasil='$rangking' WHERE idTempat = '$idTempat'");
          echo "<script>alert('Data telah Terupdate'); location.href='?menu=saw';</script>";
          }else{
              echo "<script>alert('Data GAGAL Terupdate');  </script>";
          }
    }
?>

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <div class="col-lg">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Data Lokasi</h6>
                </div>
                <div class="card-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                      <input type="text" name="idMatrik" value="<?php echo $data['idMatrik']; ?>" />
                      <input type="text" name="idTempat" value="<?php echo $data['idTempat']; ?>" />
                      <div class="form-group">
                          <label>Lokasi</label>
                          <input type="text" name="tujuan" class="form-control" value="<?php echo $data['namaTempat']; ?>" readonly>
                      </div>
                      <div class="form-group">
                          <label>Keamanan</label>
                          <select class="custom-select" name="kriteriaKeamanan" required>
                            <option value="90">Sangat Baik</option>
                            <option value="70">Baik</option>
                            <option value="50">Cukup</option>
                            <option value="30">Kurang</option>
                            <option value="10">Sangat Kurang</option>
                          </select>
                      </div>
                      <div class="form-group">
                          <label>Kenyamanan</label>
                          <select class="custom-select" name="kriteriaKenyamanan" required>
                            <option value="90">Sangat Baik</option>
                            <option value="70">Baik</option>
                            <option value="50">Cukup</option>
                            <option value="30">Kurang</option>
                            <option value="10">Sangat Kurang</option>
                          </select>
                      </div>
                      <div class="form-group">
                          <label>Akses Jalan</label>
                          <select class="custom-select" name="kriteriaAksesJalan" required>
                            <option value="90">Sangat Baik</option>
                            <option value="70">Baik</option>
                            <option value="50">Cukup</option>
                            <option value="30">Kurang</option>
                            <option value="10">Sangat Kurang</option>
                          </select>
                      </div>
                      <div class="form-group">
                          <label>Jarak</label>
                          <select class="custom-select" name="kriteriaJarak" required>
                            <option value="90">≤ 5000 Meter</option>
                            <option value="70">≤ 10000 Meter</option>
                            <option value="50">≤ 15000 Meter</option>
                            <option value="30">≤ 20000 Meter</option>
                            <option value="10">> 20000 Meter</option>
                          </select>
                      </div>
                      <input type="submit" name="simpan" class="btn btn-primary" value="Simpan">
                      <a href="?menu=saw"class="btn btn-warning">Kembali</a>
                      <!-- <button type="submit" name="simpan" class="btn btn-primary">Submit</button> -->
                    </form>
                </div>
            </div>
          </div>
        </div>
    </div>
    <!-- /.container-fluid -->
    <button  id="add" class="btn btn-primary" select-toggle="modal" select-target="#exampleModal"><i class="fas fa-plus"></i></button>
</div>
<!-- End of Main Content -->
