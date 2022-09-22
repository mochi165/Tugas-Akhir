<?php
    $idTempat = $_GET['idTempat'];
    $select=$s -> select("dataevakuasi inner join datakecamatan on datakecamatan.kodeKecamatan=dataevakuasi.kodeKecamatan where idTempat='$idTempat'");
    $data=$s -> arr($select);

    if (isset($_POST['simpan'])) {
      $update= $s -> update ("dataevakuasi SET 
          namaTempat    = '$_POST[tujuan]',
          alamat        = '$_POST[alamat]',
          kodeKecamatan = '$_POST[kodeKecamatan]',
          lat           = '$_POST[lat]',
          lng           = '$_POST[lng]',
          nilaiHasil    = '$_POST[nilaiHasil]',
          ket           = '$_POST[ket]'
          
          WHERE idTempat ='$_POST[idTempat]'");

      if($update){
          echo "<script>alert('Data telah Terupdate');location.href='?menu=dataTempat';</script>";
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
                    <h6 class="m-0 font-weight-bold text-primary">Edit Data Lokasi Evakuasi</h6>
                </div>
                <div class="card-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                      <input type="hidden" name="idTempat" value="<?php echo $data['idTempat']; ?>" />
                      <input type="hidden" name="nilaiHasil" value="<?php echo $data['nilaiHasil']; ?>" />
                      <div class="form-group">
                          <label>Lokasi</label>
                          <input type="text" name="tujuan" class="form-control" value="<?php echo $data['namaTempat']; ?>" required>
                      </div>
                      <div class="form-group">
                          <label>Alamat</label>
                          <textarea name="alamat" required class="form-control"><?php echo $data['alamat']; ?></textarea>
                      </div>
                       <div class="form-group">
                          <label>Nama Kecamatan</label>
                          <select class="custom-select" name="kodeKecamatan" required>
                            <option value="<?php echo $data['kodeKecamatan']; ?>"><?php echo $data['namaKecamatan']; ?></option>     
                          </select>
                      </div>
                      <div class="form-group">
                          <label>Koordinat</label>
                          <input type="text" name="lat" class="form-control" value="<?php echo $data['lat']; ?>" required="">
                          <input type="text" name="lng" class="form-control" value="<?php echo $data['lat']; ?>" required="">
                          <!-- <textarea name="koordinat" required class="form-control"><?php echo $data['koordinat']; ?></textarea> -->
                      </div>
                      <div class="form-group">
                          <label>Keterangan</label>
                          <textarea name="ket"  class="form-control"><?php echo $data['ket']; ?></textarea>
                      </div>
                      <input type="submit" name="simpan" class="btn btn-primary" value="Simpan">
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
