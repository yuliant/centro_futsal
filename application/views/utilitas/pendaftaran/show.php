<div class="container-fluid">

    <div>
        <?php echo $this->session->flashdata('message'); ?>
    </div>

    <div class="row">
        <div class="col-lg-7 col-sm-11">

            <!-- Card all supplier-->
            <div class="col-lg-12 mt-3">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary"><?php echo strtoupper("cetak pdf") ?></h6>
                    </div>
                    <div class="card-body">
                        Proses yang anda lalui tinggal satu langkah lagi. Silahkan download dan cetak <a href="<?= base_url('utilitas/pemeriksaan/cetak/' . $kode) ?>" target="_blank"><u>BERKAS PDF INI</u></a>
                        <div class="text-md-right mt-4">
                            <a href="<?= base_url('utilitas/pendaftaran') ?>" class="btn btn-light">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>
</div>
<!-- End of Main Content -->