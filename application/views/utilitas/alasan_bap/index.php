<div class="container-fluid">

    <div>
        <?php echo $this->session->flashdata('message'); ?>
    </div>

    <div class="row mb-6">
        <div class="col-lg-10 col-sm-11">

            <!-- Card all supplier-->
            <div class="col-lg-12 mt-3">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary"><?php echo strtoupper("pilih tanggal booking") ?></h6>
                        <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="<?php echo base_url('utilitas/alasan_bap/add') ?>">Tambah Data</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Alasan</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach ($alasan_bap as $b) : ?>
                                        <tr>
                                            <td><?php echo $i ?></td>
                                            <td><?php echo $b->alasan ?></td>
                                            <td>
                                                <a class="badge badge-danger" onclick="return confirm('Dengan anda menghapus data ini, maka data permohonan yang tertaut juga akan terhapus. Anda yakin?');" href="<?php echo base_url(); ?>utilitas/alasan_bap/delete/<?php echo $b->no_alasan_bap ?>">Hapus</a>
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