<?php 
session_start();
if( !isset($_SESSION["login"]) ) {
    header("Location: login.php");
    exit;
}


// koneksi
require 'functions.php';

if( isset($_POST["submit"]) ) {


    // //ambil data dari elemen form
    // $tipe_mobil = $_POST["tipe_mobil"];
    // $tahun = $_POST["tahun"];
    // $kode_mesin = $_POST["kode_mesin"];
    // $gambar = $_POST["gambar"];

    // query insert data
    // $query = "INSERT INTO bmw
    //             VALUES
    //             ('', '$tipe_mobil', '$tahun', '$kode_mesin', '$gambar')
    //             ";

    // mysqli_query($conn, $query);

    //cek apakah data berhasil ditambahkan atau tidak
    if( tambah($_POST) > 0){

        echo "
            <script>
                alert('data berhasil ditambahkan');
                document.location.href = 'index.php';
            </script> 
        ";
    }else {
        echo "
        <script>
            alert('data gagal ditambahkan');
            document.location.href = 'index.php';
        </script> 
    ";
    }

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah data</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="header">
        <div class="container">
            <div class="navbar">
                <nav>
                    <ul>
                        <li><a href="#">Desain</a></li>
                        <li><a href="#">Jenis</a></li>
                        <li><a href="#">Populer</a></li>
                        <li><a href="#">Galeri</a></li>
                    </ul>
                </nav>
            </div>

            <div class="box">
                <h1 class="h1_reg">Tambah Data</h1>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="tambahInput">
                        
                        <label for="tipe">Tipe Mobil  </label>
                        <input type="text" name="tipe_mobil" id="tipe" required autocomplete="off">
                        
            
                        
                        <label for="tahun">Tahun Keluar </label>
                        <input type="text" name="tahun" id="tahun" required autocomplete="off">
                        
            
                        
                        <label for="kode">Kode mesin  </label>
                        <input type="text" name="kode_mesin" id="kode" required autocomplete="off">
                        
            
                        
                        <label for="gambar">Gambar  </label>
                        <input type="file" name="gambar" id="gambar" required>
                        
                        <div class="btn-tambah">
                            <div class="buttons">
                                <button type="submit" name="submit"><span></span>Tambah Data</button>
                            </div>
                        </div>
                    </div>
                
                </form>   
            </div> 
        </div>
    </div>
</body>
</html>