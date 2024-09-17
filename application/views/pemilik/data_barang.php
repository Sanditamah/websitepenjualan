<div class="container-fluid">

    <table class="table table-bordered table-hover table-striped">
        <tr align="center">
            <th>No</th>
            <th>Id_Kategori</th>
            <th>Id_Supplier</th>
            <th>Nama Produk</th>
            <th>Keterangan</th>
            <th>Harga Produk</th>
            <th>Stok Produk</th>
            <th>Tanggal Masuk</th>
            <th>Gambar Produk</th>
        </tr>

        <?php
        $no = 1;
        foreach ($barang as $brg) : ?>

            <tr align="center">
                <td><?php echo $no++ ?></td>
                <td><?php echo $brg->id_kategori ?></td>
                <td><?php echo $brg->id_supplier ?></td>
                <td><?php echo $brg->nama_produk ?></td>
                <td><?php echo $brg->keterangan ?></td>
                <td><?php echo $brg->harga_produk ?></td>
                <td><?php echo $brg->stok_produk ?></td>
                <td><?php echo $brg->stok_produk ?></td>
                <td><img src="<?php echo base_url() . 'product/' . $brg->gambar_produk ?>" width="50px"></td>
            </tr>

        <?php endforeach; ?>

    </table>

</div>