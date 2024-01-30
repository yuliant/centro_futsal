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
    <div class="row">
        <div class="col-sm-3 mt-2">
            <div class="card" style="width: 18rem;">
                <a href="<?php echo base_url('assets/img/data/') . $b->gambar ?>" target="_blank">
                    <img src="<?php echo base_url('assets/img/data/') . $b->gambar ?>" class="card-img-top" alt="...">
                </a>
                <div class="card-body">
                    <h5 class="card-title">
                        <a href=""><?php echo $b->nama_lapangan ?></a>
                    </h5>
                    <p class="card-text ml-auto small text-start">Rp
                        <b class="text-danger">
                            <?php echo number_format($b->harga, 0, ',', '.'); ?>
                        </b> per Jam
                    </p>
                </div>
                <div class="card-footer d-flex justify-content-end align-items-center">
                    <a href="<?php echo base_url('info/jadwal/') . encrypt_url($b->id_lapangan) ?>" class="btn btn-primary justify-content-right mr-2">
                        <i class="fas fa-shopping-cart"></i> Pesan
                    </a>
                    <a href="<?php echo base_url('info/lapangan/') ?>" class="btn btn-secondary justify-content-right">
                        Kembali
                    </a>
                </div>
            </div>
        </div>
        <div class="col-sm-9 mt-2">

            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary"><?php echo "Keterangan ($b->nama_lapangan)" ?></h6>
                </div>
                <div class="card-body">
                    <?= $b->keterangan ?>
                </div>
            </div>


        </div>
        <!-- End of Main Content -->
    </div>
</div>
</div>