<div class="container-fluid">
    <h4>
        Detail Pesanan
    </h4>
    <table class="table table-bordered table-hover table-stripet">
        <tr>
            <th>Id Produk</th>
            <th>Nama Produk</th>
            <th>Jumlah Pesanan</th>
            <th>Harga Satuan</th>
            <th>Sub-total</th>
        </tr>

        <?php
        
            $total = 0;
            foreach ($pesanan as $psn) :
                $subtotal = $psn->jumlah * $psn->harga;
                $total += $subtotal;
        ?>

        <tr>
            <td><?php echo $psn->id_produk?></td>
            <td><?php echo $psn->nama_produk?></td>
            <td><?php echo $psn->jumlah?></td>
            <td><?php echo number_format($psn->harga, 0,',','.')?></td>
            <td><?php echo number_format($subtotal, 0,',','.')?></td>
        </tr>

        <?php endforeach ; ?>

        <tr>
            <td colspan="4" align="right">Grand Total</td>
            <td align="right">Rp. <?php echo number_format($total, 0,',','.')?>
        </tr>

    </table>
    <a href="<?php echo base_url('admin/invoice/index')?>"><div class="btn btn-sm btn-primary">Kembali</div></a>
</div>