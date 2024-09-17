<div class="container-fluid">
    <h3><i class="fas fa-edit"></i> EDIT PROFIL</h3>

    <div class="row">
        <div class="col-lg-8">
            <?= $this->session->flashdata('berhasil') ?>
            <form action="<?= base_url('profil/edit_profil') ?>" method="post">
                <div class="form-group row">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $profil['nama']; ?>">
                        <?= form_error('nama', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="username" class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="username" name="username" value="<?= $profil['username']; ?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $profil['alamat']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="telp" class="col-sm-2 col-form-label">No. Telp</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="telp" name="telp" value="<?= $profil['telp']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jenkel" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-10">
                        <input type="radio" name="jenkel" <?php if ($profil['jenkel'] == 'Laki-Laki') {
                                                                echo 'checked';
                                                            }
                                                            ?> value="Laki-Laki" required="required"> Laki-Laki
                        <input type="radio" name="jenkel" <?php if ($profil['jenkel']  == 'Perempuan') {
                                                                echo 'checked';
                                                            }
                                                            ?> value="Perempuan" required="required"> Perempuan
                    </div>
                </div>
                <div class="form-group row justify-content-end">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <?php echo anchor(
                            'profil/data_profil',
                            '<div class="btn btn-danger">Kembali</div>'
                        ) ?>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>