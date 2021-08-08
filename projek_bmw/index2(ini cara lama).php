<?php
//koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "mobil");

//ambil data dari tabel bmw
$result = mysqli_query($conn, "SELECT * FROM bmw");

//ambil data(fetch) bmw dari object result
//mysqli_fetch_row() // mengembalikan array numerik
//mysqli_fetch_assoc() // mengembalikan array associative
//mysqli_fetch_array() // mengembalikan keduanya
//mysqli_fetch_object() // mengembalikan object

// while ($tampil_bmw = mysqli_fetch_assoc($result)) {
//     var_dump($tampil_bmw);
// }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman BMW</title>
</head>
<body>
    <h1>Daftar Mobil BMW </h1>

    
    <table border="1" cellpadding="20" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Tipe Mobil</th>
            <th>Tahun Keluar</th>
            <th>Kode Mesin</th>
            <th>Gambar</th>
            <th>Aksi</th>
        </tr>

        <?php $i = 1 ?>
        <?php while( $row = mysqli_fetch_assoc($result) ) : ?>
        <tr>
            <td><?= $i; ?> </td>
            <td><?= $row["tipe_mobil"] ?></td>
            <td><?= $row["tahun"] ?></td>
            <td><?= $row["kode_mesin"] ?></td>
            <td><img src="img/<?= $row["gambar"]; ?>" width="200px"> </td>
            <td><a href="">Ubah</a> || <a href="">Hapus</a></td>
        </tr>
        <?php $i++; ?>
        <?php endwhile; ?>

    </table>
</body>
</html>