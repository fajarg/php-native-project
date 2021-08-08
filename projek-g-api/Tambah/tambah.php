<?php
    $conn=mysqli_connect("localhost","root","","db_gunung");
        if(isset($_POST["submit"])){
            $nama = htmlspecialchars($_POST["nama"]);
            $bentuk = htmlspecialchars($_POST["bentuk"]);
            $tinggi = htmlspecialchars($_POST["tinggi"]);
            $letusan_terakhir = htmlspecialchars($_POST["letusan_terakhir"]);
            $gambar = htmlspecialchars($_POST["gambar"]);

            $query = "INSERT INTO tb_gunung VALUES ('','$nama','$bentuk','$tinggi','$letusan_terakhir','$gambar')";

            mysqli_query($conn, $query);

            if (mysqli_affected_rows($conn) > 0) {
                echo "
                    <script>
                        alert('data berhasil ditambahkan');
                        document.location.href = '../utama.php';
                    </script>
                ";
            }
            else{
                echo "
                    <script>
                        alert('data gagal ditambahkan');
                        document.location.href = '../utama.php';
                    </script>
                ";
            }
        }

?>

<!DOCTYPE html>
<html>
<head>
        <title>Tambah Data Gunung Api</title>
        <link rel="stylesheet" type="text/css" href="style.css">
          <style type="text/css">
                p{
                        margin:0px;
                        padding: 0px;
        
                }

                body{
                        font-family: arial;
                }

                body{
                        background-image:linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)), url("../d.jpg");
                        height: 130vh;
                        background-color: white;
                        background-size: cover;
                        background-position: center bottom;
                }
                .title{
                        width: 800px;
                        height: 80px;
                        background-color: black;
                        color: white;
                        position: absolute;
                        top: 50px;
                        left: 260px;
                        opacity: 0.7;

                }
                .isi{
                        width: 600px;
                        height: 450px;
                        background-color: black;
                        color: white;
                        position: absolute;
                        top: 140px;
                        left: 260px;
                        opacity: 0.7;
                        margin: auto;
                        padding: 80px 100px;
                        
                }
                }
                .isi p{
                        margin: 0;
                        padding: 0;
                        font-weight: bold;
                }
                .isi input{
                        color: white;
                        width: 100%;
                        margin-bottom: 20px;
                        border: none;
                        background: transparent;
                        border-bottom: 1px solid white;
                        outline: none;
                        height: 40px;
                        color: white;

                }
                .isi input[type="submit"]
                {
                        border: none;
                        outline: none;
                        height: 40px;
                        background-color: red;
                        color: white;
                        font-size: 18px;

                }

        </style>
</head>
<body>
        <header>
        <div class="title">
                <h1 style="text-align: center;">Tambah Data Gunung Api</h1>
        </div>
        
        <div class="isi">
                <div class="isi2">
                        <form action="" method="post">
                        
                                       <p><label for="nama">Nama Gunung Api </label></p> 
                                        <input type="text" name="nama" id="nama" placeholder="Nama Gunung" required> 
                             
                                        <p><label for="bentuk">Bentuk Gunung Api </label></p> 
                                        <input type="text" name="bentuk" id="bentuk" placeholder="Bentuk Gunung" required> 
                               
                                        <p><label for="tinggi">Tinggi Gunung Api </label></p> 
                                        <input type="text" name="tinggi" id="tinggi" placeholder="Tinggi Gunung" required> 
                              
                                        <p><label for="letusan_terakhir">Letusan Terakhir </label></p> 
                                        <input type="text" name="letusan_terakhir" id="letusan_terakhir" placeholder="Letusan terakhir" required> 
                             
                                        <p><label for="gambar">Foto Gunung Api </label></p> 
                                        <input type="text" name="gambar" id="gambar" placeholder="Foto"> 
                                        <input type="submit" name="submit" value="Tambah Data">
                        
                        </form>
                </div>
        </div>
        </header>
</body>
</html>

