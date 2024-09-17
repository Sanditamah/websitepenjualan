<div class="container-fluid">
    <button class="btn btn-sm btn-dark mb-3" data-toggle="modal" data-target="#tambah_kategori">
        <i class="fas fa-plus fa-sm"></i> Tambah Kategori
    </button>
    <?= $this->session->flashdata('pesan') ?>
    <table class="table table-bordered">
        <tr align="center">
            <th>No</th>
            <th>Nama Kategori</th>
            <th colspan="2">Aksi</th>
        </tr>

        <?php
        $no = 1;
        foreach ($data_kategori as $ktr) : ?>

            <tr align="center">
                <td><?php echo $no++ ?></td>
                <td><?php echo $ktr->kategori ?></td>
                <td><?php echo anchor('admin/data_kategori/edit/' . $ktr->id_kategori, '<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div>') ?></td>
                <td><?php echo anchor('admin/data_kategori/hapus/' . $ktr->id_kategori, '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>') ?></td>
            </tr>

        <?php endforeach; ?>

    </table>

    <!-- Modal -->
    <div class="modal fade" id="tambah_kategori" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Input Kategori</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form action="<?php echo base_url() . 'admin/data_kategori/tambah_aksi_kategori';
                                    ?>" method="post">

                        <div class="form-group">
                            <label>Kategori</label>
                            <input type="text" name="kategori" class="form-control">
                        </div>

                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>