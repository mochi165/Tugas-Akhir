    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <div class="col-lg">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Data Bencana</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead align="center">
                                    <tr>
                                      <th rowspan="2">No.</th>
                                      <th rowspan="2">Nama Kecamatan</th>
                                      <th rowspan="2">Jenis Bencana</th>
                                      <th rowspan="2">Lokasi Kejadian</th>
                                      <th rowspan="2">Waktu Kejasian</th>
                                      <th colspan="2">koordinat</th>
                                      <th rowspan="2">Kerugian</th>
                                      <th rowspan="2">Keterangan</th>
                                      <th rowspan="2">Aksi</th>
                                    </tr>
                                    <tr>
                                        <th>Latitude</th>
                                        <th>Longitude</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $no = 1 ;
                                        // "tableBanjir inner join datakecamatan on datakecamatan.idKecamatan=tableBanjir.idKecamatan order by idBanjir ASC"
                                        $data = $s -> select("databencana 
                                            inner join datakecamatan on datakecamatan.kodeKecamatan=dataBencana.kodeKecamatan 
                                            ORDER BY idDataBencana ASC");
                                        while ($row = $s -> arr($data)) {
                                    ?>
                                    <tr>
                                      <th align="center" scope="row"><?php echo $no++; ?></th>
                                      <td><?php echo $row['namaKecamatan']; ?></td>
                                      <td><?php echo $row['namaBencana']; ?></td>
                                      <td><?php echo $row['lokasi']; ?></td>
                                      <td><?php echo $row['waktu']; ?></td>
                                      <td><?php echo $row['lat']; ?></td>
                                      <td><?php echo $row['longi']; ?></td>
                                      <td><?php echo $row['totalRugi']; ?></td>
                                      <td><?php echo $row['ket']; ?></td>
                                      <td>
                                          <a href="?menu=editRekapBencana&idDataBencana=<?php echo $row['idDataBencana'];?>" class="btn btn-success"><i class="fa fa-pen-square"></i></a> <hr>
                                          <a href="?menu=delete&idDataBencana=<?php echo $row['idDataBencana'];?>" class="btn-wide btn btn-danger disable"><i class="fa fa-minus-square"></i></a>
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
        <button  id="add" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalDB"><i class="fas fa-plus"></i></button>
</div>
<!-- End of Main Content -->