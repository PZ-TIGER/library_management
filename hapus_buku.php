<?php
session_start();  // Mulai sesi
include("koneksi.php"); 

// Periksa apakah ada ID yang dikirim melalui URL
if (isset($_GET['id'])){
    //Ambil ID dari URL
    $id = $_GET['id'];

// buat query untuk menghapus data siswa berdasarkan ID
   $sql ="DELETE FROM buku WHERE buku_id=$id";
   $query = mysqli_query($db, $sql);

   // Simpan pesan notifikasi dalam sesi berdasarkan hasil query
   if ($query){
    $_SESSION['notifikasi'] = "Data Buku Berhasil Di Hapus";
   }else{
    $_SESSION['notifikasi'] = "Data Buku Gagal Di Hapus";
   }
    
   // Alihkan ke halaman index.php
   header("Location: index.php");
}else{
    // Jika akses langsung tanpa ID, tapilkan pesan error
    die("Akses ditolak...");
}
?>




