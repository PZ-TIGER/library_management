<?php
// menghubungkan file config dengan index 
include ("koneksi.php");
session_start(); //mulai sesi
?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Barang</title>
    <style>
        /* membuat styling pada table*/
        table,th,td{
     border: 1px solid;
     border-collapse: collapse;
     padding: 10px;
        }
    </style>      
</head>
<body>
<h2>Data berhasil diperbarui!</h2>
<!-- Tampilkan Notifikasi Jika Ada -->
<?php if (isset($_SESSION['notifikasi'])): ?>
    <p><?php echo $_SESSION['notifikasi']; ?></p>
    <!-- Hapus notifikasi setelah ditampilkan -->
    <?php unset($_SESSION['notifikasi']); ?>
<?php endif; ?>
<table>
    <thead>
        <tr align="center">
            <th>#</th>
            <th>Judul buku</th>
            <th>Penulis</th>
            <th>Tahun Publikasi</th>
            <th><a href="tambah_buku.php">Tambah Data</a></th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1; // membuat penomoran data dari 1
        // membuat variable untuk menjalankan query SQL
        $query = $db->query("SELECT * FROM buku");
        /* perulangan while akan terus berjalan (menampilkan data) 
        selama kondisi $query bernilai true (adanya data pada 
        table tb_siswa) */
        while ($siswa = $query->fetch_assoc()){
            /* fungsi fetch_assoc digunakan untuk mengambil 
            data perulangan dalam bentuk array */
        ?>
        <!-- kode PHP ditutup untuk menyiapkan kode HTML
        yang akan di looping menggunakan while loop -->

        <tr>
        <td><?php echo $no++ ?></td>
        <td><?php echo $siswa['judulBuku']?></td>
        <td><?php echo $siswa['penulis']?></td>
        <td><?php echo $siswa['tahun_publikasi']?></td>
    
        
        <td align="center">
            <!-- URL ke halaman edit data dengan menggunakan 
            parameter id pada kolom table -->
            <a href="edit_buku.php?id=<?php echo $siswa['buku_id'] ?>">Edit</a>
            <!-- URL untuk menghapus data dengan menggunakan parameter id 
            pada kolom table dan alert konfirmasi hapus data -->
            <a onclick="return confirm('Anda yakin ingin menghapus data buku?')"
             href="hapus_buku.php?id=<?php echo $siswa['buku_id'] ?>">Hapus</a>
        </td>
    </tr>
<?php
    } /* Mengakhiri proses perulangan while yang dimulai pada baris 48 */
?>
</tbody>
</table>
<!-- Menghitung jumlah baris yang ada pada table (calon_siswa) -->
<p>Total: <?php echo mysqli_num_rows($query) ?></p>
</body>
</html>



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





