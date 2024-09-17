<div class="container-fluid">
    <h3><i class="fas fa-edit"></i> EDIT DATA SUPPLIER</h3>

    <div class="row">
        <div class="col-lg-8">
            <?php foreach ($admin as $adm) { ?>
                <form method="post" action="<?= base_url('admin/data_supplier/update') ?>">
                    <div class="form-group row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="hidden" class="form-control" id="id_admin" name="id_admin" value="<?= $adm->id_admin ?>">
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
                            <input type="text" class="form-control" id="role_id" name="role_id" value="<?= $adm->role_id ?>" readonly>
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