            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <hr>
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; <script>document.write(new Date().getFullYear());</script></span> <b style="color: #088080; margin-top:"> Restu Fatwian | 065117109</b>  All Rights Reserved.
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->
    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Logout?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Pilih "Logout" jika ingin keluar dari aplikasi ini.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="<?php echo $s->URL(); ?>/func/logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Data Bencana -->
    <div class="modal fade" id="exampleModalB" tabindex="-1" role="dialog" aria-labelledby="exampleModal" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Data Bencana</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
            <form action="func/inputDataBencana.php" method="POST" enctype="multipart/form-data">
          <div class="modal-body">
                <div class="form-group">
                    <label>Nama Bencana</label>
                    <input type="text" name="namaBencana" class="form-control" required placeholder="Nama Bencana">
                </div>
                <div class="form-group">
                    <label>Keterangan</label>
                    <input type="text" name="ket" class="form-control" >
                </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
            </form>
        </div>
      </div>
    </div>

    <!-- Modal Data Rekap Bencana -->
    <div class="modal fade" id="exampleModalDB" tabindex="-1" role="dialog" aria-labelledby="exampleModal" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Data Bencana</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
            <form action="func/inputRekapBencana.php" method="POST" enctype="multipart/form-data">
          <div class="modal-body">
                <div class="form-group">
                    <label>Nama (<i>Kecamatan</i>)</label>
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
                    <input type="text" name="namaBencana" class="form-control" required placeholder="Jenis Bencana">
                </div>
                <div class="form-group">
                    <label>Lokasi Kejadian</label>
                    <input type="text" name="lokasi" required class="form-control">
                </div>
                <div class="form-group">
                    <label>Waktu Kejadian</label>
                    <input type="date" name="waktu" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Koordinat</label>
                    <input type="text" name="lat" class="form-control" required placeholder="Latitude">
                    <input type="text" name="long" class="form-control" required placeholder="Longitude">
                </div>

                <div class="form-group">
                    <label>Total Kerugian</label>
                    <input type="number" name="totalKerugian" value="0"  class="form-control">
                </div>
                <div class="form-group">
                    <label>Keterangan</label>
                    <textarea name="keterangan" class="form-control" rows="3"></textarea>
                </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
            </form>
        </div>
      </div>
    </div>

    <!-- Modal Data Kecamatan -->
    <div class="modal fade" id="exampleModalK" tabindex="-1" role="dialog" aria-labelledby="exampleModal" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Data Kecamatan</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
            <form action="func/inputDataKecamatan.php" method="POST" enctype="multipart/form-data">
          <div class="modal-body">
                <div class="form-group">
                    <label>Kode Kecamatan</label>
                    <input type="number" name="kodeKecamatan" class="form-control" required placeholder="kode Kecamatan">
                </div>
                <div class="form-group">
                    <label>Nama Kecamatan</label>
                    <input type="text" name="namaKecamatan" class="form-control" required placeholder="Nama Kecamatan">
                </div>
                <div class="form-group">
                    <label>Jumlah Desa</label>
                    <input type="text" name="jumlahDesa" class="form-control"  placeholder="Jumlah Desa">
                </div>
                <div class="form-group">
                    <label>Geojson Kecamatan</label>
                    <input type="file" name="file" class="form-control" >
                </div>
                <div class="form-group">
                    <label>warna</label>
                    <input type="color" name="warnaKecamatan" class="form-control" >
                </div>
                <div class="form-group">
                    <label>Keterangan</label>
                    <textarea class="form-control" name="ketKecamatan" rows="3"></textarea>
                </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
            </form>
        </div>
      </div>
    </div>
    </div>

    <!-- Modal Data Lokasi -->
    <div class="modal fade" id="exampleModalTempat" tabindex="-1" role="dialog" aria-labelledby="exampleModal" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Data Lokasi</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
            <form action="func/inputDataLokasi.php" method="POST" enctype="multipart/form-data">
          <div class="modal-body">
                <div class="form-group">
                    <label>Nama Tempat</label>
                    <input type="text" name="namaTempat" class="form-control" required placeholder="Nama Tempat">
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <textarea name="alamat" required class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label>Nama (<i>Kecamatan</i>)</label>
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
                    <label>Koordinat</label>
                    <input type="text" class="form-control" name="lat" placeholder="Latitude">
                    <input type="text" class="form-control" name="lng" placeholder="Longitude">
                </div>
                <div class="form-group">
                    <label>Keterangan</label>
                    <textarea name="ket" class="form-control" rows="3"></textarea>
                </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
            </form>
        </div>
      </div>
    </div>

    <!-- Modal Data SAW -->
    <div class="modal fade" id="exampleModalSAW" tabindex="-1" role="dialog" aria-labelledby="exampleModal" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Data Evakuasi</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
            <form action="func/inputDataSAW.php" method="POST" enctype="multipart/form-data">
          <div class="modal-body">
                <div class="form-group">
                    <label>Lokasi</label>
                    <select class="custom-select" name="idTempat" required>
                      <?php 
                        $dataKecamatan = $s -> select("dataevakuasi");
                        while ($row = $s -> arr($dataKecamatan)) {
                      ?>
                      <option value="<?php echo $row['idTempat']; ?>"><?php echo $row['namaTempat']; ?></option>
                      <?php } ?>
                    </select>
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
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
            </form>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo $s->URL(); ?>/assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo $s->URL(); ?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="<?php echo $s->URL(); ?>/assets/vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="<?php echo $s->URL(); ?>/assets/js/sb-admin-2.min.js"></script>
    <!-- Page level plugins -->
    <script src="<?php echo $s->URL(); ?>/assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo $s->URL(); ?>/assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <!-- Page level custom scripts -->
    <script src="<?php echo $s->URL(); ?>/assets/js/demo/datatables-demo.js"></script>
    <!-- Data Table -->
    <script src="<?php echo $s->URL(); ?>/assets/datatable/jquery-3.2.1.min.js"></script>
    <script src="<?php echo $s->URL(); ?>/assets/datatable/jquery.dataTables.min.js"></script>
    <script src="<?php echo $s->URL(); ?>/assets/datatable/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">$('#table').DataTable();</script>
    <script type="text/javascript">$('#table2').DataTable();</script>

</body>
</html>