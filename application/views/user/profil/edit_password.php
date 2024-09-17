<div class="container-fluid">
    <h3><i class="fas fa-edit"></i> EDIT PASSWORD</h3>

    <div class="row">
        <div class="col-lg-6">
            <?= $this->session->flashdata('message') ?>
            <form action="<?= base_url('profil/edit_password') ?>" method="post">
                <div class="form-group">
                    <label for="password_lama">Password Lama</label>
                    <input type="password" class="form-control" id="password_lama" name="password_lama">
                    <?= form_error('password_lama', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
                <div class="form-group">
                    <label for="password1">Password Baru</label>
                    <input type="password" class="form-control" id="password1" name="password1">
                    <?= form_error('password1', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
                <div class="form-group">
                    <label for="password2">Ulangi Password</label>
                    <input type="password" class="form-control" id="password2" name="password2">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Ubah Password</button>
                    <?php echo anchor(
                        'profil/data_profil',
                        '<div class="btn btn-danger">Kembali</div>'
                    ) ?>
                </div>
            </form>
        </div>
    </div>

</div>