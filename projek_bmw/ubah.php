<?php 
session_start();
if( !isset($_SESSION["login"]) ) {
    header("Location: login.php");
    exit;
}

// koneksi
require 'functions.php';

// ambil data di url
$id = $_GET["id"];

// query data bmw berdasarkan id
$bmw = query("SELECT * FROM bmw WHERE id = $id")[0];




//cek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit"]) ) {

    //cek apakah data berhasil diubah atau tidak
    if( ubah($_POST) > 0){

        echo "
            <script>
                alert('data berhasil diubah');
                document.location.href = 'index.php';
            </script> 
        ";
    }else {
        echo "
        <script>
            alert('data gagal diubah');
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
    <title>Ubah data</title>
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
                <h1 class="h1_reg">Ubah data</h1>
                <form action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $bmw["id"]; ?>">
                    <input type="hidden" name="gambarLama" value="<?= $bmw["gambar"]; ?>">
                    <div class="tambahInput">
                        
                        <label for="tipe">Tipe Mobil  </label>
                        <input type="text" name="tipe_mobil" id="tipe" value="<?= $bmw["tipe_mobil"]; ?>" required autocomplete="off">
                        
            
                        
                        <label for="tahun">Tahun Keluar </label>
                        <input type="text" name="tahun" id="tahun"  value="<?= $bmw["tahun"]; ?>" required autocomplete="off">
                        
            
                        
                        <label for="kode">Kode mesin  </label>
                        <input type="text" name="kode_mesin" id="kode" value="<?= $bmw["kode_mesin"]; ?>" required autocomplete="off">
                        
            
                        
                        <label for="gambar">Gambar  </label>
                        <img src="img/<?= $bmw["gambar"]; ?>" width="45px">
                        <input type="file" name="gambar" id="gambar" required>
                        
                        <div class="btn-tambah">
                            <div class="buttons">
                                <button type="submit" name="submit"><span></span>Ubah Data</button>
                            </div>
                        </div>
                    </div>
                
                </form>   
            </div> 
        </div>
    </div>
</body>
</html>