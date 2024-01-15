<div class="container-fluid">

    <div>
        <?php echo $this->session->flashdata('message'); ?>
    </div>

    <div class="row">
        <div class="col-lg-9 col-sm-11">

            <!-- Card all supplier-->
            <div class="col-lg-12 mt-3">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary"><?php echo strtoupper("cari") ?></h6>
                    </div>
                    <div class="card-body">
                        <form action="" method="get" autocomplete="off">

                            <div class="form-group row">
                                <label for="kode" class="col-sm-2 col-form-label">NIK</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="kode" name="kode">
                                </div>
                            </div>

                            <div class="text-md-right">
                                <button class="btn btn-primary" type="submit" id="save-btn">Cari</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Card all supplier-->
            <div class="col-lg-12 mt-3">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary"><?php echo strtoupper("cetak antrian") ?></h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>NIK</th>
                                        <th>Tanggal</th>
                                        <th>Metode BAP</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach ($kedatangan as $b) : ?>
                                        <tr>
                                            <td><?php echo $i ?></td>
                                            <td><?php echo $b->nik ?></td>
                                            <td><?php echo $b->tgl_kedatangan ?></td>
                                            <td><?php echo $b->metode_bap ?></td>
                                            <td>
                                                <a class="badge badge-success" href="<?php echo base_url(); ?>utilitas/pemeriksaan/cetak/<?php echo $b->kode_pendaftaran ?>" target="_blank">Cetak</a>
                                                <a class="badge badge-warning" href="<?php echo base_url(); ?>pemohon/detail/index/<?php echo $b->id_pemohon_dd ?>">Detail</a>
                                            </td>
                                        </tr>
                                    <?php
                                        $i++;
                                    endforeach; ?>
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
<!-- End of Main Content -->