<div class="container-fluid">

    <table class="table table-bordered table-hover table-striped">
        <tr align="center">
            <th>No</th>
            <th>Nama Kategori</th>
        </tr>

        <?php
        $no = 1;
        foreach ($data_kategori as $ktr) : ?>

            <tr align="center">
                <td><?php echo $no++ ?></td>
                <td><?php echo $ktr->kategori ?></td>
            </tr>

        <?php endforeach; ?>

    </table>

</div>