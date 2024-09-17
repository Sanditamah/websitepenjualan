<div class="container-fluid">

    <div class="row text-center">
        <?php foreach ($susu_kucing as $brg) : ?>

            <div class="card ml-3 mb-3" style="width: 16rem;">
                <img src="<?php echo base_url() . './product/' . $brg->gambar_produk ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title mb-1"><?php echo $brg->nama_produk ?></h5>
                    <span class="badge badge-pill badge-dark mb-3">Rp. <?php echo number_format($brg->harga_produk, 0, ',', '.') ?></span><br>
                    <?php echo anchor(
                        'dashboard/masukkan_keranjang/' . $brg->id_produk,
                        '<div class="btn btn-sm btn-dark">Masukkan Keranjang</div>'
                    ) ?>
                    <?php echo anchor(
                        'dashboard/detail/' . $brg->id_produk,
                        '<div class="btn btn-sm btn-dark">Detail</div>'
                    ) ?>
                </div>
            </div>

        <?php endforeach; ?>
    </div>
</div>