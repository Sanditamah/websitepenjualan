<div class="container-fluid">
    <h4>Invoice Pemesanan Produk</h4>
    <?= $this->session->flashdata('pesan') ?>
    <table class="table table-bordered table-hover table-striped">
        <tr align="center">
            <th>Id invoice</th>
            <th>Nama Pemesanan</th>
            <th>Alamat Pengiriman</th>
            <th>Tanggal Pemesanan</th>
            <th>Batas Pembayaran</th>
            <th colspan="2">Aksi</th>
        </tr>

        <?php foreach ($invoice as $inv) : ?>
            <tr align="center">
                <td><?php echo $inv->id_invoice ?> </td>
                <td><?php echo $inv->nama ?> </td>
                <td><?php echo $inv->alamat ?> </td>
                <td><?php echo $inv->tgl_pesan ?> </td>
                <td><?php echo $inv->batas_bayar ?> </td>
                <td><?php echo anchor('admin/invoice/detail/' . $inv->id_invoice, '<div class="btn btn-sm btn btn-primary">Detail</div>') ?></td>
                <td><?php echo anchor('admin/invoice/hapus/' . $inv->id_invoice, '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>') ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>