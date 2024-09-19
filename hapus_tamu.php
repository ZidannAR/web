<?php
require_once "function.php";

if (isset($_GET['id'])) {
       $id = $_GET['id'];
       if (hapus($id) > 0 ) {
              echo "<script>alert('data berhasil dihapus')</script>";
              echo" <script>window.location.href='buku_tamu.php'</script>";
       }else{
              echo "<script>alert('data gagal dihapus')</script>";
       }
}
