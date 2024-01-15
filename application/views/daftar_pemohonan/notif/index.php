<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800"><?php echo $title; ?></h1>

    <div>
        <?php echo $this->session->flashdata('message'); ?>
    </div>

    <div class="col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary"><?php echo "DAFTAR NOTIFIKASI" ?></h6>
                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="<?php echo base_url('pemohon/notif/readall/') ?>">Tandai Sudah Dibaca Semua</a>
                        <a class="dropdown-item" onclick="return confirm('Apakah anda yakin ingin menghapus seluruh notif?')" href="<?php echo base_url('pemohon/notif/deleteall/') ?>">Hapus Semua</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Notifikasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;
                            foreach ($notif as $b) : ?>
                                <tr class="<?= ($b->baca) ? '' : 'bg-secondary' ?>">
                                    <td class="text-primary"><?php echo $i ?></td>
                                    <td><a href="<?php echo base_url(); ?>pemohon/notif/baca/<?php echo $b->id_notif ?>"><?php echo $b->judul ?></a></td>
                                </tr>
                            <?php $i++;
                            endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>

</div>
<!-- End of Main Content -->