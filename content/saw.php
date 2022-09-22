    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <div class="col-lg">
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Perankingan</h6>
              </div>
              <div class="card-body">
                <div class="accordion" id="accordionExample">
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingData">
                      <!-- <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseData" aria-expanded="true" aria-controls="collapseData">
                        Lihat Data
                      </button> -->
                    </h2>
                    <div id="collapseData" class="accordion-collapse collapse show" aria-labelledby="headingData" data-bs-parent="#accordionExample">
                      <div class="accordion-body">
                        <div class="table-responsive">
                          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                              <thead>
                                  <tr>
                                    <th>No.</th>
                                    <th>Nama Tempat</th>
                                    <th>Alamat</th>
                                    <th>Kecamatan</th>
                                    <th>Koordinat</th>
                                    <th>Nilai Hasil</th>
                                    <th>Keterangan</th>

                                    <th>Aksi</th>
                                  </tr>
                              </thead>
                              <tbody>
                                <?php 
                                  $no = 1 ;
                                  $data = $s -> select("dataevakuasi 
                                    inner join datakecamatan on datakecamatan.kodeKecamatan=dataevakuasi.kodeKecamatan 
                                    inner join tablematrik on tablematrik.idTempat=dataevakuasi.idTempat
                                    order by nilaiHasil DESC");
                                  while ($row = $s -> arr($data)) {
                                ?>
                                <tr>
                                  <th scope="row"><?php echo $no++; ?></th>
                                  <td><?php echo $row['namaTempat']; ?></td>
                                  <td><?php echo $row['alamat']; ?></td>
                                  <td><?php echo $row['namaKecamatan']; ?></td>
                                  <td><?php echo $row['lat']."&nbsp,&nbsp".$row['lng']; ?></td>
                                  <td><?php echo $row['nilaiHasil']; ?></td>
                                  <td><?php echo $row['ket']; ?></td>
                                  <td align="center">
                                      <a href="?menu=lf-rute&idTempat=<?php echo $row['idTempat'];?>" class="btn btn-primary">Peta &nbsp; <i class="fa fa-arrow-right"></i></a> <hr>
                                      <a href="?menu=editSaw&idMatrik=<?php echo $row['idMatrik'];?>" class="btn btn-success"><i class="fa fa-pen-square"></i></a> &nbsp;
                                      <a href="?menu=delete&idMatrik=<?php echo $row['idMatrik'];?>" class="btn-wide btn btn-danger disable"><i class="fa fa-minus-square"></i></a>
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
            </div>
          </div>
        </div>
    <!-- /.container-fluid -->
    <button  id="add" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalSAW"><i class="fas fa-plus"></i></button>
    </div>
<!-- End of Main Content -->
