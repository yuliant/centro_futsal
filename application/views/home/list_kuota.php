<div class="container-fluid">

    <div>
        <?php echo $this->session->flashdata('message'); ?>
    </div>

    <div class="row mb-6">
        <div class="col"></div>
        <div class="col-lg-8 col-sm-11">

            <!-- Card all supplier-->
            <div class="col-lg-12 mt-3">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary"><?php echo strtoupper("pilih tanggal booking") ?></h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Tanggal</th>
                                        <th>Kuota</th>
                                        <th>Jam Mulai</th>
                                        <th>Jam Selesai</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach ($kedatangan as $b) : ?>
                                        <tr>
                                            <td><?php echo $i ?></td>
                                            <td><a href="<?php echo base_url(); ?>home/add/<?php echo encrypt_url($id_pemohon_dd) ?>/<?php echo encrypt_url($b->id_tgl_kedatangan) ?>"><?php echo date("d-m-Y", strtotime($b->tgl_kedatangan)) ?></a></td>
                                            <td><?php echo $b->kuota ?></td>
                                            <td><?php echo $b->jam_mulai ?></td>
                                            <td><?php echo $b->jam_selesai ?></td>
                                            <td>
                                                <a class="badge badge-success" href="<?php echo base_url(); ?>home/add/<?php echo encrypt_url($id_pemohon_dd) ?>/<?php echo encrypt_url($b->id_tgl_kedatangan) ?>">Booking</a>
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

                <a class="btn btn-secondary" href="#" onclick="goBack()">batal</a>
            </div>

        </div>
        <div class="col"></div>
    </div>

</div>
</div>
<!-- End of Main Content -->