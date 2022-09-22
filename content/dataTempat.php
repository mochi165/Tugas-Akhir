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
                                      <th>Nama KEcamatan</th>
                                      <th>Nama Tempat</th>
                                      <th>Alamat</th>
                                      <th>Koordinat</th>
                                      <th>keterangan</th>
                                      <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $no = 1 ;
                                        $data = $s -> select("dataevakuasi inner join datakecamatan on datakecamatan.kodeKecamatan=dataevakuasi.kodeKecamatan");
                                        while ($row = $s -> arr($data)) {
                                    ?>
                                    <style type="text/css">
                                    
                                    </style>
                                    <tr>
                                      <th scope="row"><?php echo $no++; ?></th>
                                      <td><?php echo $row['namaKecamatan']; ?></td>
                                      <td><?php echo $row['namaTempat']; ?></td>
                                      <td><?php echo $row['alamat']; ?></td>
                                      <td> <?php echo $row['lat']; ?>, <?php echo $row['lng']; ?></td>
                                      <td><?php echo $row['ket']; ?></td>
                                      <td>
                                          <a href="?menu=editTempat&idTempat=<?php echo $row['idTempat'];?>" class="btn btn-success"><i class="fa fa-pen-square"></i></a> <hr>
                                          <a href="?menu=delete&idTempat=<?php echo $row['idTempat'];?>" class="btn-wide btn btn-danger disable"><i class="fa fa-minus-square"></i></a>
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
        <button  id="add" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalTempat"><i class="fas fa-plus"></i></button>


</div>
<!-- End of Main Content -->