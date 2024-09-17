<div class="container-fluid">
    <table class="table table-bordered table-hover table-striped">
        <tr align="center">
            <th>No</th>
            <th>Nama Produk</th>
            <th>Stok Produk</th>
        </tr>

        <?php
        $no = 1;
        foreach ($barang as $brg) : ?>

            <tr align="center">
                <td><?php echo $no++ ?></td>
                <td><?php echo $brg->nama_produk ?></td>
                <td><?php echo $brg->stok_produk ?></td>
            </tr>

        <?php endforeach; ?>

    </table>

</div>