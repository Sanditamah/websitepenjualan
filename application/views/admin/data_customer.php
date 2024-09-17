<div class="container-fluid">
    <?= $this->session->flashdata('pesan') ?>
    <table class="table table-bordered">
        <tr align="center">
            <th>No</th>
            <th>Nama</th>
            <th>Username</th>
            <th>Alamat</th>
            <th>No. Telp</th>
            <th>Jenis Kelamin</th>
            <th colspan="2">Aksi</th>
        </tr>

        <?php
        $no = 1;
        foreach ($customer as $cus) : ?>

            <tr align="center">
                <td><?php echo $no++ ?></td>
                <td><?php echo $cus->nama ?></td>
                <td><?php echo $cus->username ?></td>
                <td><?php echo $cus->alamat ?></td>
                <td><?php echo $cus->telp ?></td>
                <td><?php echo $cus->jenkel ?></td>
                <td><?php echo anchor('admin/data_customer/hapus/' . $cus->id_customer, '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>') ?></td>
            </tr>

        <?php endforeach; ?>

    </table>
</div>