<?php
session_start(); // Mulai sesi

include("koneksi.php");

// Periksa apakah tombol "simpan" pada form edit ditekan
if (isset($_POST['simpan'])) {
    // Ambil data dari form
    $id = $_POST['buku_id'];
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $tahun = $_POST['tahun'];
    
    // Buat query untuk memperbarui data siswa
    $sql = "UPDATE buku SET
        judulBuku='$judul', 
        penulis='$penulis',
        tahun_publikasi='$tahun' 
        WHERE buku_id=$id";

    $query = mysqli_query($db, $sql);
    // Simpan pesan notifikasi dalam sesi berdasarkan hasil query
    if ($query) {
        $_SESSION['notifikasi'] = "Data barang berhasil diperbarui!";
    } else {
        $_SESSION['notifikasi'] = "Data barang gagal diperbarui!";
    }

    // Alihkan ke halaman index.php
    header('Location: index.php');
} else {
    // Jika akses langsung tanpa form, tampilkan pesan error
    die("Akses ditolak...");
}
?>