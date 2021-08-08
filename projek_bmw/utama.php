<?php
session_start();
if( !isset($_SESSION["login"]) ) {
    header("Location: login.php");
    exit;
}

//koneksi ke database
require 'functions.php';




if( isset($_POST["cari"]) ) {
    $keyword = $_POST["keyword"];
    $_SESSION['keyword'] = $keyword; 
}else {
    $keyword = $_SESSION['keyword'];
    $_SESSION['keyword'] = $keyword; 
}



    // pagination
    // konfigurasi
    $jumlahDataPerHalaman = 3;
    $jumlahData = count(query("SELECT * FROM bmw WHERE
                        tipe_mobil LIKE '%$keyword%' OR
                        tahun LIKE '%$keyword%' OR
                        kode_mesin LIKE '%$keyword%'"));
    $jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
    $halamanAktif = ( isset($_GET["halaman"]) ) ? $_GET["halaman"] : 1;
    $awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;

$array_bmw = query ("SELECT * FROM bmw 
                                WHERE
                                tipe_mobil LIKE '%$keyword%' OR
                                tahun LIKE '%$keyword%' OR
                                kode_mesin LIKE '%$keyword%' 
                                LIMIT $awalData, $jumlahDataPerHalaman");

if ($halamanAktif > $jumlahDataPerHalaman ) {
    $start_number = $halamanAktif - $jumlahDataPerHalaman;
}else{
    $start_number = 1;
}

if( $halamanAktif < ($jumlahHalaman - $halamanAktif) ){
    $end_number = $halamanAktif + $jumlahDataPerHalaman;
}else {
    $end_number = $jumlahHalaman;
}
//ambil data dari tabel bmw
//$result = mysqli_query($conn, "SELECT * FROM bmw");

//ambil data(fetch) bmw dari object result
//mysqli_fetch_row() // mengembalikan array numerik
//mysqli_fetch_assoc() // mengembalikan array associative
//mysqli_fetch_array() // mengembalikan keduanya
//mysqli_fetch_object() // mengembalikan object

// while ($tampil_bmw = mysqli_fetch_assoc($result)) {
//     var_dump($tampil_bmw);
// }


// tombol cari ditekan
// if( isset($_POST["cari"]) ) {

//     $keyword = $_POST["keyword"];
//     $jumlahDataPerHalaman_c = 2;
//     $jumlahData_c = count(query("SELECT * FROM bmw WHERE
//                             tipe_mobil LIKE '%$keyword%' OR
//                             tahun LIKE '%$keyword%' OR
//                             kode_mesin LIKE '%$keyword%'"));
//     $jumlahHalaman_c = ceil($jumlahData_c / $jumlahDataPerHalaman_c);
//     $halamanAktif_c = ( isset($_GET["halamanC"]) ) ? $_GET["halamanC"] : 1;
//     $awalData = ($jumlahDataPerHalaman_c * $halamanAktif_c) - $jumlahDataPerHalaman_c;
//     $query = "SELECT * FROM bmw 
//                 WHERE
//                 tipe_mobil LIKE '%$keyword%' OR
//                 tahun LIKE '%$keyword%' OR
//                 kode_mesin LIKE '%$keyword%' 
//                 LIMIT $awalData, $jumlahDataPerHalaman_c";

//     $array_bmw = query($query);
//     $_SESSION["keyword"] = $keyword;

// }






    


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman utama</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .page {
            display: flex;
            justify-content: center;
        }
        .page > div {
            background-color: white;
            width: 30px;
            margin: 8px;
            text-align: center;
            line-height: 20px;
            font-size: 14px;
            cursor: pointer;
            
        }
        .page .hal-aktif {
            background-color: cyan;
        }

        .page a{
            text-decoration: none;
            font-weight: bold;
            color: black;
        } 
    </style>
</head>
<body>
    <div class="header-utama">
        <class="container">
            <div class="navbar">
                <nav>
                    <ul>
                        <li><a href="tambah.php">Tambah Data</a></li>
                        <li><a href="kembali_data.php">Tampil Data</a></li>
                        <li><a href="#">Populer</a></li>
                        <li><a href="logout.php">Log Out</a></li>
                    </ul>
                </nav>
                <div class="form">
                    <form action="" method="post">
    
                        <input type="text" name="keyword" autofocus placeholder=" masukan keyword..." autocomplete="off">
                        <button type="submit" name="cari"><span></span>CARI</button>
                
                    </form>
                </div>
                
            </div>

            <div class="judul">
                <h1 class="h1-utama">Daftar Mobil</h1>
            </div>

            <table border="0" cellpadding="5" cellspacing="6">
                <tr class="head">
                    <th>No</th>
                    <th>Tipe Mobil</th>
                    <th>Tahun Keluar</th>
                    <th>Kode Mesin</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>

                <?php $i = $awalData + 1; ?>
                <?php foreach( $array_bmw as $row ) : ?>
                <tr class="tr-body" align="center">
                    <td><?= $i; ?> </td>
                    <td><?= $row["tipe_mobil"]; ?></td>
                    <td><?= $row["tahun"]; ?></td>
                    <td><?= $row["kode_mesin"]; ?></td>
                    <td><img src="img/<?= $row["gambar"]; ?>" width="100px"> </td>
                    <td><a href="ubah.php?id=<?= $row["id"]; ?>">Ubah</a> | 
                    <a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('yakin')";>Hapus</a></td>
                </tr>
                <?php $i++; ?>
                <?php endforeach; ?>
            </table>
        <!-- navigasi page -->
            <div class="page">
            

                <?php if( $halamanAktif > 1 ) : ?>
                    <div><a href="?halaman=<?= $halamanAktif - 1; ?>">&laquo;</a></div>
                <?php endif; ?>
                    <?php for( $i = $start_number; $i <= $end_number; $i++ ) : ?>
                        <?php if( $i == $halamanAktif ) : ?>
                            <div class="hal-aktif"> <a href="?halaman=<?= $i; ?>"><?= $i; ?></a> </div>
                        <?php else : ?>
                            <div> <a href="?halaman=<?= $i; ?>"><?= $i; ?></a> </div>
                        <?php endif; ?>   
                    <?php endfor; ?>
                <?php if( $halamanAktif < $jumlahHalaman ) : ?>    
                        <div><a href="?halaman=<?= $halamanAktif + 1; ?>">&raquo;</a></div>
                <?php endif; ?>

            </div>

        </div>
        
        
    </div>
</body>
</html>