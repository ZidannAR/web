 <!-- Begin Page Content -->
 <?php include_once('templates/header.php') ?>
 <?php
    require_once('function.php');
    ?>
 <div class="container-fluid">

     <!-- Page Heading -->
     <h1 class="h3 mb-4 text-gray-800">Data user</h1>

     <?php
        if (isset($_POST['simpan'])) {
            if (tambah_user($_POST) > 0) {

        ?>
             <div class="alert alert-success" role="alert">
                 data berhasil disimpan!
             </div>
         <?php
            } else {
            ?>
             <div class="alert alert-danger" role="alert">
                 Data gagal disimpan
             </div>
     <?php
            }
        }
        ?>

     <!DOCTYPE html>
     <html lang="en">

     <head>

         <meta charset="utf-8">
         <meta http-equiv="X-UA-Compatible" content="IE=edge">
         <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
         <meta name="description" content="">
         <meta name="author" content="">

         <title>SB Admin 2 - Tables</title>

         <!-- Custom fonts for this template -->
         <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
         <link
             href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
             rel="stylesheet">

         <!-- Custom styles for this template -->
         <link href="css/sb-admin-2.min.css" rel="stylesheet">

         <!-- Custom styles for this page -->
         <link href="assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

     </head>

     <body id="page-top">




         <!-- DataTales Example -->
         <div class="card shadow mb-4">
             <div class="card-header py-3">
                 <button type="button" class="btn btn-primary btn-icon-split"
                     data-toggle="modal" data-target="#tambahModal"><span class="icon text-white-50">
                         <i class="fa fa-plus"></i>
                     </span><span class="text">Tambah user</span></button>
             </div>
             <div class="card-body">
                 <div class="table-responsive">
                     <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                         <thead>
                             <tr>
                                 <th>No</th>
                                 <th>Username</th>
                                 <th>role</th>
                                 <th>Aksi</th>
                             </tr>
                         </thead>
                         <?php
                            $no = 1;
                            $users = query("SELECT * FROM  users");
                            foreach ($users as $user) :
                            ?>
                             <tr>

                                 <td><?= $no++; ?></td>
                                 <td><?= $user['id_user'] ?></td>
                                 <td><?= $user['username'] ?></td>
                                 <td><?= $user['user_role'] ?></td>
                                 <td><a class="btn btn-success" href="edit-tamu.php?id=<?= $user['id_user'] ?>">ubah</a>
                                     <a onclick="comfirm('apakah anda yakin menghapus data ini?')" class="btn btn-danger" href="hapus_tamu.php?id=<?= $user['id_user'] ?>" >hapus</a>
                                 </td>
                             </tr>
                         <?php endforeach; ?>
                         <tbody>

                             <tr>
                              <th>No</th>
                                 <th>Username</th>
                                 <th>role</th>
                                 <th>Aksi</th>
                             </tr>

                         </tbody>
                     </table>
                 </div>
             </div>
         </div>

 </div>
 <!-- /.container-fluid -->

 </div>
 <!-- End of Main Content -->

 <!-- Footer -->
 <footer class="sticky-footer bg-white">
     <div class="container my-auto">
         <div class="copyright text-center my-auto">
             <span>Copyright &copy; Your Website 2020</span>
         </div>
     </div>
 </footer>
 <!-- End of Footer -->

 </div>
 <!-- End of Content Wrapper -->

 </div>
 <!-- End of Page Wrapper -->

 <!-- Scroll to Top Button-->
 <a class="scroll-to-top rounded" href="#page-top">
     <i class="fas fa-angle-up"></i>
 </a>

 <!-- Logout Modal-->
 <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                 <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">×</span>
                 </button>
             </div>
             <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
             <div class="modal-footer">
                 <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                 <a class="btn btn-primary" href="login.html">Logout</a>
             </div>
         </div>
     </div>
 </div>

 <?php
    $query = mysqli_query($koneksi, "SELECT max(id_tamu) as kodeTerbesar FROM users");
    $data = mysqli_fetch_array($query);
    $kodeTamu = $data['kodeTerbesar'];

    $urutan = (int) substr($kodeuser, 3, 2);

    $urutan++;

    $huruf = "usr";
    $kodeTamu = $huruf . sprintf("%03s", $urutan);
    ?>
 <!-- Modal -->
 <div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="tambahModalLabel">Modal title</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 <div class="modal-body">
                     <form method="post" action="">
                         <input type="hidden" name="id_user" id="id_user" value="<?= $kodeuser ?>">
                         <div class="form-group row">
                             <label for="nama_user" class="col-sm-3 col-form-label">Username</label>
                             <div class="col-sm-8">
                                 <input type="text" class="form-control" id="nama_user" name="nama_user">
                             </div>
                         </div>
                         <div class="form-group row">
                             <label for="password" class="col-sm-3 col-form-label">Password</label>
                             <div class="col-sm-8">
                                 <input type="password" class="form-control" id="password" name="password"></input>
                             </div>
                         </div>
                         <div class="form-group row">
                             <label for="user_role" class="col-sm-3 col-form-label">User Role</label>
                             <div class="col-sm-8">
                                 <select type="text" class="form-control" id="user_role" name="user_role">
                                   <option value="admin">Admin</option>
                                   <option value="operator">Operator</option>
                                 </select>
                             </div>
                         </div>  
                 </div>
                 </form>
             </div>
         </div>
     </div>
 </div>
 </div>

 <!-- Bootstrap core JavaScript-->
 <script src="vendor/jquery/jquery.min.js"></script>
 <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

 <!-- Core plugin JavaScript-->
 <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

 <!-- Custom scripts for all pages-->
 <script src="js/sb-admin-2.min.js"></script>

 <!-- Page level plugins -->
 <script src="assets/vendor/datatables/jquery.dataTables.min.js"></script>
 <script src="assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

 <!-- Page level custom scripts -->
 <script src="assets/js/demo/datatables-demo.js"></script>


 </body>

 </html>

 </div>
 <!-- /.container-fluid -->
 <?php include_once('templates/footer.php') ?>