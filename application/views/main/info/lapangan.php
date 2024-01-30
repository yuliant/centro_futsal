<div class="container-fluid">
    <div class="row">
        <?php
        $i = 1;
        foreach ($lapangan as $b) : ?>
            <div class="col-sm-3 mt-2">
                <div class="card" style="width: 18rem;">
                    <img src="<?php echo base_url('assets/img/data/') . $b->gambar ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="<?= base_url('info/lapangan_detail/' . encrypt_url($b->id_lapangan)) ?>"><?php echo $b->nama_lapangan ?></a>
                        </h5>
                        <p class="card-text ml-auto small text-start">Rp
                            <b class="text-danger">
                                <?php echo number_format($b->harga, 0, ',', '.'); ?>
                            </b> per Jam
                        </p>
                    </div>
                    <div class="card-footer d-flex justify-content-end align-items-center">
                        <a href="<?php echo base_url('info/jadwal/') . encrypt_url($b->id_lapangan) ?>" class="btn btn-primary justify-content-right">
                            <i class="fas fa-shopping-cart"></i> Pesan
                        </a>
                    </div>
                </div>
            </div>
        <?php
            $i++;
        endforeach; ?>
    </div>
</div>