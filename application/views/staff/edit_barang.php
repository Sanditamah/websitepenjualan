<div class="container-fluid">
    <h3><i class="fas fa-edit"></i> EDIT DATA BARANG</h3>

    <div class="row">
        <div class="col-lg-8">
            <?= $this->session->flashdata('pesan') ?>
            <?php foreach ($barang as $brg) { ?>
                <form action="<?php echo base_url() . 'admin/data_barang/update'; ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label for="id_kategori" class="col-sm-2 col-form-label">Id_Kategori</label>
                        <div class="col-sm-10">
                            <input type="hidden" class="form-control" id="id_produk" name="id_produk" value="<?= $brg->id_produk ?>">
                            <select name="id_kategori" class="form-control">
                                <?php foreach ($data_kategori as $ktr) { ?>
                                    <option value="<?php echo $ktr->id_kategori ?>"><?php echo $ktr->kategori  ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="id_suplier" class="col-sm-2 col-form-label">Id_Supplier</label>
                        <div class="col-sm-10">
                            <select name="id_supplier" class="form-control">
                                <?php foreach ($data_supplier as $spl) { ?>
                                    <option value="<?php echo $spl->id_supplier ?>"><?php echo $spl->nama ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nama_produk" class="col-sm-2 col-form-label">Nama Produk</label>
                        <div class="col-sm-10">
                            <input type="hidden" name="id_produk" value="<?= $brg->id_produk ?>">
                            <input type="text" class="form-control" id="nama_produk" name="nama_produk" value="<?= $brg->nama_produk ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="keterangan" name="keterangan" value="<?= $brg->keterangan ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="harga_produk" class="col-sm-2 col-form-label">Harga Produk</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="harga_produk" name="harga_produk" value="<?= $brg->harga_produk ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="stok_produk" class="col-sm-2 col-form-label">Stok Produk</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="stok_produk" name="stok_produk" value="<?= $brg->stok_produk ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-2 col-form-label">Gambar Produk</div>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-sm-3">
                                    <img src="<?= base_url('product/') . $brg->gambar_produk ?>" width="100">
                                </div>
                                <div class="col-sm-9">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="gambar_produk" name="gambar_produk">
                                        <label for="gambar_produk" class="custom-file-label">Pilih Gambar</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row justify-content-end">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Edit</button>
                        </div>
                    </div>
        </div>
    </div>

<?php } ?>

</div>