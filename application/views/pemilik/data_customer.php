<div class="container-fluid">

    <table class="table table-bordered table-hover table-striped">
        <tr align="center">
            <th>No</th>
            <th>Nama</th>
            <th>Username</th>
            <th>Alamat</th>
            <th>No. Telp</th>
            <th>Jenis Kelamin</th>

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
            </tr>

        <?php endforeach; ?>

    </table>
</div>