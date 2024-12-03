<?php
// Termasuk file konfigurasi
include("koneksi.php");

// Mengambil ID siswa dari parameter URL
$id = $_GET['id'];

// Mengambil data siswa dari database berdasarkan ID
$query = $db->query("SELECT * FROM buku WHERE buku_id = '$id'");
$siswa = $query->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Barang</title>
</head>
<body>
    <h3>Edit Data Barang</h3>
    <form action="proses_edit.php" method="POST">
        <!-- Menyimpan ID untuk proses selanjutnya -->
        <input type="hidden" name="buku_id" value="<?php echo $siswa['buku_id']; ?>">
        <table border="0">
        <tr>
                <td>judul Buku</td>
                <td>
                    <input type="text" name="judul" value="<?php echo $siswa['judulBuku']; ?>" required>
                </td>
            </tr>
            <tr>
                <td>Penulis</td>
                <td>
                    <input type="text" name="penulis" value="<?php echo $siswa['penulis']; ?>" required>
                </td>
            </tr>
            
            <tr>
                <td>Tahun Publikasi</td>
                <td>
                    <input type="text" name="tahun" value="<?php echo $siswa['tahun_publikasi']; ?>">
                </td>
            </tr>
            
        </table>
        <button type="submit" name="simpan">Simpan</button>
    </form>
</body>
</html>