<?php
    $idDataBencana = $_GET['idDataBencana'];
    $select=$s -> select("databencana where idDataBencana='$idDataBencana'");
    $data=$s -> arr($select);

    if (isset($_POST['simpan'])) {
      $update= $s -> update ("databencana SET
        kodeKecamatan = '$_POST[kodeKecamatan]',
        namaBencana   = '$_POST[namaBencana]',
        lokasi        = '$_POST[lokasi]',
        waktu         = '$_POST[waktu]',
        lat           = '$_POST[lat]',
        longi         = '$_POST[long]',
        totalRugi     = '$_POST[totalRugi]',
        ket           = '$_POST[ket]'

        WHERE idDataBencana = '$_POST[idDataBencana]'
       ");
      if($update){
          echo "<script>alert('Data telah Terupdate');location.href='?menu=rekapDataBencana';</script>";
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
                    <h6 class="m-0 font-weight-bold text-primary">Edit Data Bencana</h6>
                </div>
                <div class="card-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                      <input type="hidden" name="idDataBencana" value="<?php echo $data['idDataBencana']; ?>" >
                      <div class="form-group">
                          <label>Nama Kecamatan</label>
                          <select class="custom-select" name="kodeKecamatan" required>
                            <?php 
                              $dataKecamatan = $s -> select("datakecamatan ORDER BY idKecamatan ASC");
                              while ($row = $s -> arr($dataKecamatan)) {
                            ?>
                            <option value="<?php echo $row['kodeKecamatan']; ?>"><?php echo $row['namaKecamatan']; ?></option>
                            <?php } ?>
                          </select>
                      </div>
                      <div class="form-group">
                          <label>Jenis Bencana</label>
                          <input type="text" name="namaBencana" class="form-control" value="<?php echo $data['namaBencana']; ?>">
                      </div>
                      <div class="form-group">
                          <label>Lokasi Kejadian</label>
                          <textarea name="lokasi" class="form-control" rows="3"><?php echo $data['lokasi']; ?></textarea>
                      </div>
                      <div class="form-group">
                          <label>Waktu Kejadian</label>
                          <input type="date" name="waktu" class="form-control" value="<?php echo $data['waktu']; ?>" required>
                      </div>
                      <div class="form-group">
                          <label>Koordinat</label>
                          <input type="text" name="lat" class="form-control" required value="<?php echo $data['lat']; ?>">
                          <input type="text" name="long" class="form-control" required value="<?php echo $data['longi']; ?>">
                      </div>

                      <div class="form-group">
                          <label>Total Kerugian</label>
                          <input type="number" name="totalRugi" class="form-control" value="<?php echo $data['totalRugi']; ?>">
                      </div>
                      <div class="form-group">
                          <label>Keterangan</label>
                          <textarea name="ket" class="form-control" rows="3"><?php echo $data['ket']; ?></textarea>
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
    
</div>
<!-- End of Main Content -->
