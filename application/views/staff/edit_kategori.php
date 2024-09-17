<div class="container-fluid">
    <h3><i class="fas fa-edit"></i> EDIT DATA KATEGORI</h3>
    <?php foreach ($kategori as $ktr) { ?>
        <form method="post" action="<?= base_url('staff/data_kategori/update') ?>">
            <div class="form-group">
                <label>Kategori</label>
                <input type="hidden" name="id_kategori" value="<?= $ktr->id_kategori ?>">
                <input type="text" name="kategori" class="form-control" value="<?= $ktr->kategori ?>">
            </div>
            <button type="submit" class="btn btn-primary btn-sm mt-3">Ubah</button>
        </form>
    <?php } ?>
</div>