<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800"><?php echo $title; ?></h1>

    <div>
        <?php echo $this->session->flashdata('message'); ?>
    </div>

    <div class="col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary"><?php echo "Status PENDAFTARAN" ?></h6>
                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="<?php echo base_url('utilitas/pendaftaran') ?>">Tambah Data</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Lapangan</th>
                                <th>Harga</th>
                                <th>Gambar</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($pemohon as $b) : ?>
                                <tr>
                                    <td><?php echo $i ?></td>
                                    <td><a href="<?php echo base_url(); ?>pemohon/detail/index/<?php echo $b->id_lapangan ?>"><?php echo $b->nama_lapangan ?></a></td>
                                    <td><?php echo $b->harga ?></td>
                                    <td><?php echo $b->gambar ?></td>
                                    <td>
                                        <a class="badge badge-danger" href="<?php echo base_url(); ?>pemohon/pendaftar/delete/<?php echo $b->id_lapangan ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data pendaftaran ini?');">delete</a>
                                        <a class="badge badge-primary" href="<?php echo base_url(); ?>pemohon/pendaftar/edit/<?php echo $b->id_lapangan ?>">edit</a>
                                        <!-- <a class="badge badge-warning" href="<?php echo base_url(); ?>pemohon/pendaftar/kirim/<?php echo $b->id_lapangan ?>" onclick="return confirm('Apakah anda yakin ingin mengubah status ke cek berkas?');">kirim CEK BERKAS</a> -->
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
<!-- End of Main Content -->