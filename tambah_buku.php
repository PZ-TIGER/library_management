<!DOCTYPE html>
<html>
    <head>
        <title>Data Barang</title>
    </head>
    <body>
        <h3>Tambah Data Barang</h3>
        <form action="proses_tambah.php" method="POST">
        <table border="0">
        <tr>
            <td>Judul Buku</td>
            <td><input type="text" name="judul" required></td>
        </tr>
        <tr>
        <td>Penulis</td>
        <td><input type="text" name="penulis" required></td>
        </tr>

        <tr>
            <td>Tahun Publikasi</td>
            <td><input type="text" name="tahun"></td>
        </tr>
        
        </table>
        <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
        </form>
    </body>
</html>