<!-- Begin Page Content -->
<?php include_once('templates/header.php') ?>
<?php include_once('function.php') ?>
<?php

if ($_GET['id']) {
       $id_user = $_GET['id'];

       // ambil data user yang sesuai dengan id
       $data = query("SELECT * FROM users WHERE id_user = '$id_user'")[0];
}
?>


<div class="container-fluid">


       <!-- Page Heading -->
       <h1 class="h3 mb-4 text-gray-800">Ubah Data user</h1>

       <?php
       if (isset($_POST['simpan'])) {
              if (ubah_user($_POST) > 0) {

       ?>
                     <div class="alert alert-success" role="alert">
                            Data berhasil diubah!
                     </div>
              <?php
              } else {
              ?>
                     <div class="alert alert-danger" role="alert">
                            data gagal diubah!
                     </div>
       <?php
              }
       }
       ?>

       <div class="card shadow mb-mp4">
              <div class="card-header py-3">
                     <h6>Data user</h6>
              </div>
              <div class="card-body">
            <form method="post" action="">
                <input type="hidden" name="id_user" id="id_user" value="<?= $data['id_user'] ?>">
                <div class="form-group row">
                    <label for="username" class="col-sm-3 col-form-label">Username</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="username" name="username" value="<?= $data['username'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="user_role" class="col-sm-3 col-form-label">User Role</label>
                    <div class="col-sm-8">
                        <select class="form-control" id="user_role" name="user_role">
                            <option value="admin" <?= $data['user_role'] === 'admin' ? 'selected' : ''; ?>>Administrator</option>
                            <option value="operator" <?= $data['user_role'] === 'operator' ? 'selected' : ''; ?>>Operator</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-8 offset-sm-3 d-flex justify-content-end">
                        <a class="btn btn-danger btn-icon-split" href="users.php">
                            <span class="icon text-white-50"><i class="fas fa-chevron-left"></i></span>
                            <span class="text">Kembali</span>
                        </a>
                        <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

       <!-- /.container-fluid -->
       <?php include_once('templates/footer.php') ?>