 <!-- Begin Page Content -->
 <?php include_once('templates/header.php') ?>
 <?php
    require_once('function.php');
    ?>
 <div class="container-fluid">

     <!-- Page Heading -->
     <h1 class="h3 mb-4 text-gray-800">Buku Tamu</h1>

     <?php
        if (isset($_POST['simpan'])) {
            if (tambah_tamu($_POST) > 0) {

        ?>
             <div class="alert alert-success" role="alert">
                 data berhasil disimpan! asiik
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
        <?php if (isset($_SESSION['role']) && $_SESSION ['role'] != 'operator'){
        
        echo "<script>alert('Anda Tidak Memiliki Akses')</script>";
        echo "<script>window.location.href='index.php'</script>";
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
                     </span><span class="text">Data Tamu</span></button>
             </div>
             <div class="card-body">
                 <div class="table-responsive">
                     <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                         <thead>
                             <tr>
                                 <th>No</th>
                                 <th>Tanggal</th>
                                 <th>Nama Tamu</th>
                                 <th>Alamat</th>
                                 <th>no hp</th>
                                 <th>bertemu dengan</th>
                                 <th>Kepentingan</th>
                                 <th>Aksi</th>
                             </tr>
                         </thead>
                         <?php
                            $no = 1;
                            $buku_tamu = query("SELECT * FROM  buku_tamu");
                            foreach ($buku_tamu as $tamu) :
                            ?>
                             <tr>

                                 <td><?= $no++; ?></td>
                                 <td><?= $tamu['tanggal'] ?></td>
                                 <td><?= $tamu['nama_tamu'] ?></td>
                                 <td><?= $tamu['alamat'] ?></td>
                                 <td><?= $tamu['no_hp'] ?></td>
                                 <td><?= $tamu['bertemu'] ?></td>
                                 <td><?= $tamu['kepentingan'] ?></td>
                                 <td><a class="btn btn-success" href="edit-tamu.php?id=<?= $tamu['id_tamu'] ?>">ubah</a>
                                     <a onclick="comfirm('apakah anda yakin menghapus data ini?')" class="btn btn-danger" href="hapus_tamu.php?id=<?= $tamu['id_tamu'] ?>" >hapus</a>
                                 </td>
                             </tr>
                         <?php endforeach; ?>
                         <tbody>

                             <tr>
                                 <th>No</th>
                                 <th>Tanggal</th>
                                 <th>Nama Tamu</th>
                                 <th>Alamat</th>
                                 <th>No Hp</th>
                                 <th>bertemu dengan</th>
                                 <th>Kepentingan</th>
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
    $query = mysqli_query($koneksi, "SELECT max(id_tamu) as kodeTerbesar FROM buku_tamu");
    $data = mysqli_fetch_array($query);
    $kodeTamu = $data['kodeTerbesar'];

    $urutan = (int) substr($kodeTamu, 2, 3);

    $urutan++;

    $huruf = "zt";
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
                         <input type="hidden" name="id_tamu" id="id_tamu" value="<?= $kodeTamu ?>">
                         <div class="form-group row">
                             <label for="nama_tamu" class="col-sm-3 col-form-label">Nama Tamu</label>
                             <div class="col-sm-8">
                                 <input type="text" class="form-control" id="nama_tamu" name="nama_tamu">
                             </div>
                         </div>
                         <div class="form-group row">
                             <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                             <div class="col-sm-8">
                                 <textarea class="form-control" id="alamat" name="alamat"></textarea>
                             </div>
                         </div>
                         <div class="form-group row">
                             <label for="no_hp" class="col-sm-3 col-form-label">No. Telepon</label>
                             <div class="col-sm-8">
                                 <input type="text" class="form-control" id="no_hp" name="no_hp">
                             </div>
                         </div>
                         <div class="form-group row">
                             <label for="bertemu" class="col-sm-3 col-form-label">Bertemu dg. </label>
                             <div class="col-sm-8">
                                 <input type="text" class="form-control" id="bertemu" name="bertemu">
                             </div>
                         </div>
                         <div class="form-group row">
                             <label for="kepentingan" class="col-sm-3 col-form-label">Kepentingan</label>
                             <div class="col-sm-8">
                                 <input type="text" class="form-control" id="kepentingan" name="kepentingan">
                             </div>
                         </div>
                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                     <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
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