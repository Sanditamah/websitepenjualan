<div class="container-fluid">

    <table class="table table-bordered table-hover table-striped">
        <tr align="center">
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Username</th>
            <th>Password</th>
            <th>No. Telp</th>
            <th>Alamat</th>
            <th>Email</th>
            <th>Role_id</th>
        </tr>

        <?php
        foreach ($admin as $adm) : ?>

            <tr align="center">
                <td><?php echo $adm->nama ?></td>
                <td><?php echo $adm->jenkel ?></td>
                <td><?php echo $adm->username ?></td>
                <td><?php echo $adm->password ?></td>
                <td><?php echo $adm->telp ?></td>
                <td><?php echo $adm->alamat ?></td>
                <td><?php echo $adm->email ?></td>
                <td><?php echo $adm->role_id ?></td>
            </tr>

        <?php endforeach; ?>

    </table>

</div>