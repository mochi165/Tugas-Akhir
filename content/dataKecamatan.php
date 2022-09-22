    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <div class="col-lg">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Data Kecamatan</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                      <th>No.</th>
                                      <th>Kode Kecamatan</th>
                                      <th>Nama Kecamatan</th>
                                      <th>Jumlah Desa</th>
                                      <th>Geojson</th>
                                      <th>Warna Peta</th>
                                      <th>keterangan</th>
                                      <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $no = 1 ;
                                        $data = $s -> select("datakecamatan ORDER BY kodeKecamatan ASC");
                                        while ($row = $s -> arr($data)) {
                                    ?>
                                    <style type="text/css">
                                    
                                    </style>
                                    <tr>
                                      <th scope="row"><?php echo $no++; ?></th>
                                      <td><?php echo $row['kodeKecamatan']; ?></td>
                                      <td><?php echo $row['namaKecamatan']; ?></td>
                                      <td><?php echo $row['jumlahDesa']; ?></td>
                                      <td> <a href="<?php echo $s->URL(); ?>/assets/geojson/<?php echo $row['geojsonKecamatan']; ?>" target="_BLANK"><?php echo $row['namaKecamatan']; ?></a></td>
                                      <td style="background : <?php echo $row['warnaKecamatan']; ?>"></td>
                                      <td><?php echo $row['ketKecamatan']; ?></td>
                                      <td>
                                          <a href="?menu=editKecamatan&idKecamatan=<?php echo $row['idKecamatan'];?>" class="btn btn-success"><i class="fa fa-pen-square"></i></a> <hr>
                                          <a href="?menu=delete&idKecamatan=<?php echo $row['idKecamatan'];?>" class="btn-wide btn btn-danger disable"><i class="fa fa-minus-square"></i></a>
                                      </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
        <button  id="add" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalK"><i class="fas fa-plus"></i></button>


</div>
<!-- End of Main Content -->