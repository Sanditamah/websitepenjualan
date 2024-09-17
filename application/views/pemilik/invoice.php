<div class="container-fluid">
    <h4>Invoice Pemesanan Produk</h4>

    <table class="table table-bordered table-hover table-striped">
        <tr align="center">
            <th>Id invoice</th>
            <th>Nama Pemesanan</th>
            <th>Alamat Pengiriman</th>
            <th>Tanggal Pemesanan</th>
            <th>Batas Pembayaran</th>
            <th colspan="1">Aksi</th>
        </tr>

        <?php foreach ($invoice as $inv) : ?>
            <tr align="center">
                <td><?php echo $inv->id_invoice ?> </td>
                <td><?php echo $inv->nama ?> </td>
                <td><?php echo $inv->alamat ?> </td>
                <td><?php echo $inv->tgl_pesan ?> </td>
                <td><?php echo $inv->batas_bayar ?> </td>
                <td><?php echo anchor('pemilik/invoice/detail/' . $inv->id_invoice, '<div class="btn btn-sm btn btn-primary">Detail</div>') ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>