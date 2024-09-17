<div class="container-fluid">
    <button class="btn btn-sm btn-dark mb-3" data-toggle="modal" data-target="#tambah_barang">
        <i class="fas fa-plus fa-sm"></i> Tambah Barang
    </button>

    <?= $this->session->flashdata('pesan') ?>
    <table class="table table-bordered">
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
            <th colspan="2">Aksi</th>
        </tr>

        <?php
        $no = 1;
        foreach ($barang as $brg) { ?>

            <tr align="center">
                <td><?php echo $no++ ?></td>
                <td><?php echo $brg->id_kategori ?></td>
                <td><?php echo $brg->id_supplier ?></td>
                <td><?php echo $brg->nama_produk ?></td>
                <td><?php echo $brg->keterangan ?></td>
                <td><?php echo $brg->harga_produk ?></td>
                <td><?php echo $brg->stok_produk ?></td>
                <td><?php echo $brg->tgl_masuk ?></td>
                <td><img src="<?= base_url('./product/') . $brg->gambar_produk ?>" width="50px"></td>
                <td><?php echo anchor('admin/data_barang/edit/' . $brg->id_produk, '<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div>') ?></td>
                <td><?php echo anchor('admin/data_barang/hapus/' . $brg->id_produk, '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>') ?></td>
            </tr>

        <?php } ?>

    </table>

    <!-- Modal -->
    <div class="modal fade" id="tambah_barang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Input Produk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form action="<?php echo base_url() . 'admin/data_barang/tambah_aksi'; ?>" method="post" enctype="multipart/form-data">

                        <div class="form-group">
                            <label>Kategori</label>
                            <select name="id_kategori" class="form-control">
                                <option disabled selected value> --- Pilih Kategori --- </option>
                                <?php foreach ($data_kategori as $ktr) { ?>
                                    <option value="<?php echo $ktr->id_kategori ?>"><?php echo $ktr->kategori  ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Supplier</label>
                            <select name="id_supplier" class="form-control">
                                <option disabled selected value> --- Pilih Supplier --- </option>
                                <?php foreach ($data_supplier as $spl) { ?>
                                    <option value="<?php echo $spl->id_supplier ?>"><?php echo $spl->nama ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Nama Produk</label>
                            <input type="text" name="nama_produk" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Keterangan</label>
                            <input type="text" name="keterangan" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Harga Produk</label>
                            <input type="text" name="harga_produk" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Stok Produk</label>
                            <input type="text" name="stok_produk" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Gambar Produk</label>
                            <input type="file" name="gambar_produk" class="form-control">
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