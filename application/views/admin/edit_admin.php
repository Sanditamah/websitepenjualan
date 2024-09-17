<div class="container-fluid">
    <h3><i class="fas fa-edit"></i> EDIT DATA ADMIN</h3>

    <div class="row">
        <div class="col-lg-8">
            <?php foreach ($admin as $adm) { ?>
                <form method="post" action="<?= base_url('admin/data_admin/update') ?>">
                    <div class="form-group row">
                        <label for="hak_akses" class="col-sm-2 col-form-label">Hak Akses</label>
                        <div class="col-sm-10">
                            <input type="hidden" name="id_admin" value="<?= $adm->id_admin ?>">
                            <div class="col-sm-10">
                                <input type="radio" name="hak_akses" <?php if ($adm->hak_akses == 'Admin') {
                                                                            echo 'checked';
                                                                        }
                                                                        ?> value="Admin" required="required"> Admin &nbsp;
                                <input type="radio" name="hak_akses" <?php if ($adm->hak_akses == 'Staff') {
                                                                            echo 'checked';
                                                                        }
                                                                        ?> value="Staff" required="required"> Staff &nbsp;
                                <input type="radio" name="hak_akses" <?php if ($adm->hak_akses == 'Pemilik Toko') {
                                                                            echo 'checked';
                                                                        }
                                                                        ?> value="Pemilik Toko" required="required"> Pemilik Toko &nbsp;
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama" name="nama" value="<?= $adm->nama ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="jenkel" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-10">
                            <input type="radio" name="jenkel" <?php if ($adm->jenkel == 'Laki-Laki') {
                                                                    echo 'checked';
                                                                }
                                                                ?> value="Laki-Laki" required="required"> Laki-Laki &nbsp;
                            <input type="radio" name="jenkel" <?php if ($adm->jenkel == 'Perempuan') {
                                                                    echo 'checked';
                                                                }
                                                                ?> value="Perempuan" required="required"> Perempuan
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="username" class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="username" name="username" value="<?= $adm->username ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="password" name="password" value="<?= $adm->password ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="telp" class="col-sm-2 col-form-label">No. Telp</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="telp" name="telp" value="<?= $adm->telp ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $adm->alamat ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="email" name="email" value="<?= $adm->email ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="role_id" class="col-sm-2 col-form-label">Role_id</label>
                        <div class="col-sm-10">
                            <input type="radio" name="role_id" <?php if ($adm->role_id == '1') {
                                                                    echo 'checked';
                                                                }
                                                                ?> value="1" required="required"> 1 &nbsp;
                            <input type="radio" name="role_id" <?php if ($adm->role_id == '2') {
                                                                    echo 'checked';
                                                                }
                                                                ?> value="2" required="required"> 2 &nbsp;
                            <input type="radio" name="role_id" <?php if ($adm->role_id == '3') {
                                                                    echo 'checked';
                                                                }
                                                                ?> value="3" required="required"> 3 &nbsp;
                        </div>
                    </div>
                    <div class="form-group row justify-content-end">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Edit</button>
                        </div>
                    </div>
                </form>
            <?php } ?>
        </div>
    </div>
</div>