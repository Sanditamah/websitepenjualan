<div class="container-fluid">
    <button class="btn btn-sm btn-dark mb-3" data-toggle="modal" data-target="#tambah_admin">
        <i class="fas fa-plus fa-sm"></i> Tambah Admin
    </button>
    <?= $this->session->flashdata('pesan') ?>
    <table class="table table-bordered">
        <tr align="center">
            <th>Hak Akses</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Username</th>
            <th>Password</th>
            <th>No. Telp</th>
            <th>Alamat</th>
            <th>Email</th>
            <th>Role_id</th>
            <th colspan="2">Aksi</th>
        </tr>

        <?php
        foreach ($admin as $adm) : ?>

            <tr align="center">
                <td><?php echo $adm->hak_akses ?></td>
                <td><?php echo $adm->nama ?></td>
                <td><?php echo $adm->jenkel ?></td>
                <td><?php echo $adm->username ?></td>
                <td><?php echo $adm->password ?></td>
                <td><?php echo $adm->telp ?></td>
                <td><?php echo $adm->alamat ?></td>
                <td><?php echo $adm->email ?></td>
                <td><?php echo $adm->role_id ?></td>
                <td><?php echo anchor('admin/data_admin/edit/' . $adm->id_admin, '<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div>') ?></td>
                <td><?php echo anchor('admin/data_admin/hapus/' . $adm->id_admin, '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>') ?></td>
            </tr>

        <?php endforeach; ?>

    </table>

    <!-- Modal -->
    <div class="modal fade" id="tambah_admin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Input Admin</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form action="<?php echo base_url() . 'admin/data_admin/tambah_aksi_admin';
                                    ?>" method="post" enctype="multipart/form-data">

                        <div class="form-group">
                            <label>Hak Akses</label>
                            <select name="hak_akses" class="form-control">
                                <option disabled selected value> --- Pilih --- </option>
                                <option>Admin</option>
                                <option>Staff</option>
                                <option>Pemilik Toko</option>
                                <option>Supplier</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="nama" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <select name="jenkel" class="form-control">
                                <option disabled selected value> --- Pilih --- </option>
                                <option>Laki-Laki</option>
                                <option>Perempuan</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input type="text" name="password" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>No. Telepon</label>
                            <input type="text" name="telp" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Alamat </label>
                            <input type="text" name="alamat" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Email </label>
                            <input type="text" name="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Role_id</label>
                            <select name="role_id" class="form-control">
                                <option disabled selected value> --- Pilih --- </option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                            </select>
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