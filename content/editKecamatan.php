<?php
    $idKecamatan = $_GET['idKecamatan'];
    $select=$s -> select("datakecamatan where idKecamatan='$idKecamatan'");
    $data=$s -> arr($select);

    if (isset($_POST['simpan'])) {

      $lokasi_file=$_FILES['gambar']['tmp_name'];
      $nama_file=$_FILES['gambar']['name'];
      $folder= "assets/geojson/".$nama_file;
      move_uploaded_file($lokasi_file,"$folder");
      $update= $s -> update ("datakecamatan SET 
          kodeKecamatan   = '$_POST[kodeKecamatan]',
          namaKecamatan   = '$_POST[namaKecamatan]',
          jumlahDesa      = '$_POST[jumlahDesa]',
          geojsonKecamatan= '$nama_file',
          warnaKecamatan  = '$_POST[warnaKecamatan]',
          ketKecamatan    = '$_POST[ketKecamatan]'

          WHERE idKecamatan ='$_POST[idKecamatan]'");

      if($update){
          echo "<script>alert('Data telah Terupdate'); location.href='?menu=dataKecamatan';</script>";
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
                    <h6 class="m-0 font-weight-bold text-primary">Edit Data Bencana Banjir</h6>
                </div>
                <div class="card-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                      <input type="text" name="idKecamatan" value="<?php echo $data['idKecamatan']; ?>" />
                      <div class="form-group">
                          <label>Kode Kecamatan)</label>
                          <input type="text" name="kodeKecamatan" class="form-control" value="<?php echo $data['kodeKecamatan']; ?>" required>
                      </div>
                      <div class="form-group">
                          <label>nama Kecamatan</label>
                          <input type="text" name="namaKecamatan" class="form-control" value="<?php echo $data['namaKecamatan']; ?>" required>
                      </div>
                      <div class="form-group">
                          <label>Jumlah Desa</label>
                          <input type="number" name="jumlahDesa" class="form-control" value="<?php echo $data['jumlahDesa']; ?>" required>
                      </div>
                      <div class="form-group">
                          <label>GeoJson Kecamatan</label>
                          <input type="file" name="gambar" class="form-control"  required>
                      </div>
                      <div class="form-group">
                          <label>Warna Kecamatan</label>
                          <input type="color" name="warnaKecamatan" class="form-control" required>
                      </div>
                      <div class="form-group">
                          <label>Keterangan</label>
                          <textarea name="ketKecamatan" class="form-control" rows="3"><?php echo $data['ketKecamatan']; ?></textarea>
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
