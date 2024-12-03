<?php
session_start(); // Mulai sesi
// Menghubungkan file ini dengan file konfigurasi database
include("koneksi.php");

// Mengecek apakah tombol 'simpan' telah ditekan
if (isset($_POST['simpan'])) {
    /* Mengambil nilai dari form input
       dan menyimpannya ke dalam variabel */
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $tahun = $_POST['tahun'];

    // Menyusun query SQL untuk menambahkan data ke tabel 'tb_siswa'
    $sql = "INSERT INTO buku 
    (judulBuku, penulis, tahun_publikasi)
     VALUES ('$judul', '$penulis', '$tahun')"; 

    // Menjalankan query dan menyimpan hasilnya dalam variabel $query
    $query = mysqli_query($db, $sql);

    // Simpan pesan di sesi
    if ($query) {
        $_SESSION['notifikasi'] = "Data buku berhasil ditambahkan!";
    } else {
        $_SESSION['notifikasi'] = "Data buku gagal ditambahkan!";
    }

    // Alihkan ke halaman index.php
    header('Location: index.php');
} else {
    // Jika akses langsung tanpa form, tampilkan pesan error
    die("Akses ditolak...");
}
?>


