<!DOCTYPE html>
<html lang="en">

<body>
    <main class="main">

        <div class="content">
            <h1 align="center"> Settings</h1>
            <div class="card">
                <div class="card-header">
                    <b>Profile Settings</b>
                    <a href="<?= base_url('profil/edit_profil') ?>">Edit Profile</a>
                </div>
                <div class="card-body">
                    Nama : <span class="txt-grey"><?= $profil['nama']; ?></span>
                    <br>
                    Username : <span class="txt-grey"><?= $profil['username']; ?></span>
                    <br>
                    Alamat : <span class="txt-grey"><?= $profil['alamat']; ?></span>
                    <br>
                    No. Telp : <span class="txt-grey"><?= $profil['telp']; ?></span>
                    <br>
                    Jenis Kelamin : <span class="txt-grey"><?= $profil['jenkel']; ?></span>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <b>Security & Password</b>
                    <a href="<?= base_url('profil/edit_password') ?>">Edit Password</a>
                </div>
                <div class="card-body">
                    Your Password: <span class="txt-grey">******</span>
                </div>
            </div>
        </div>
        <div class="form-group row justify-content-end">
            <div class="col-sm-10">
                <?php echo anchor(
                    'dashboard',
                    '<div class="btn btn-danger">Kembali</div>'
                ) ?>
            </div>
        </div>
    </main>
</body>

</html>