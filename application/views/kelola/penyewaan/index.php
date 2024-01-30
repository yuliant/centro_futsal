<?php
function convert_tanggal($tanggal_input)
{
    $bulan = array(
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $pecahkan = explode('-', $tanggal_input);
    return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
}
?>
<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800"><?php echo $title; ?></h1>

    <div>
        <?php echo $this->session->flashdata('message'); ?>
    </div>

    <div class="col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary"><?php echo "Kelola Jadwal" ?></h6>
                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="<?php echo base_url('kelola/jadwal/add') ?>">Tambah Data</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>User</th>
                                <th>Tanggal</th>
                                <th>Lapangan</th>
                                <th>Jam</th>
                                <th>Status</th>
                                <th>Konfirmasi</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($booking as $b) : ?>
                                <tr>
                                    <td><?php echo $i ?></td>
                                    <td>
                                        <a href="<?php echo base_url(); ?>admin/edit_user/<?php echo $b->id ?>">
                                            <?php echo $b->name ?>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="<?php echo base_url(); ?>kelola/lapangan/edit/<?php echo $b->id_lapangan ?>">
                                            <?php echo $b->nama_lapangan ?>
                                        </a>
                                    </td>
                                    <td>
                                        <?php echo convert_tanggal($b->tgl_jadwal) ?>
                                    </td>
                                    <td>
                                        <a href="<?php echo base_url(); ?>kelola/jadwal/edit/<?php echo $b->id_jadwal ?>">
                                            <?php echo $b->jam ?>
                                        </a>
                                    </td>
                                    <td><?php if ($b->status == 0) { ?>
                                            <span class='badge-warning'>Tunda</span>
                                        <?php } elseif ($b->status == 1) { ?>
                                            <span class='badge-success'>Konfirmasi</span>
                                        <?php } else { ?>
                                            <span class='badge-danger'>Tolak</span>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <a href="<?php echo base_url('assets/img/data/') . $b->bukti_bayar ?>" target="_blank">
                                            <img src="<?php echo base_url('assets/img/data/') . $b->bukti_bayar ?>" alt="" width="100" srcset="">
                                        </a>
                                    </td>
                                    <td>
                                        <a class="badge badge-danger" href="<?php echo base_url(); ?>kelola/penyewaan/change/<?php echo $b->id_penyewaan ?>/<?= '2' ?>" onclick="return confirm('Apakah anda yakin ingin menolak pesanan ini?');">Tolak</a>
                                        <a class="badge badge-success" href="<?php echo base_url(); ?>kelola/penyewaan/change/<?php echo $b->id_penyewaan ?>/<?= '1' ?>" onclick="return confirm('Apakah anda yakin ingin konfirmasi pesanan ini?');">Konfirmasi</a>
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