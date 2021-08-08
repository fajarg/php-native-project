<?php
    $id=$_GET["id"];
    $conn=mysqli_connect("localhost","root","","db_gunung");
    $result = mysqli_query($conn, "SELECT * FROM tb_gunung WHERE id = $id");
        if(isset($_POST["submit"])){
            $nama = htmlspecialchars($_POST["nama"]);
            $bentuk = htmlspecialchars($_POST["bentuk"]);
            $tinggi = htmlspecialchars($_POST["tinggi"]);
            $letusan_terakhir = htmlspecialchars($_POST["letusan_terakhir"]);
            $gambar = htmlspecialchars($_POST["gambar"]);

            $query = "UPDATE tb_gunung SET 
                        nama = '$nama',
                        bentuk = '$bentuk',
                        tinggi = '$tinggi',
                        letusan_terakhir = '$letusan_terakhir',
                        gambar = '$gambar'
                        WHERE id = $id
                    ";

            mysqli_query($conn, $query);
            
            

            if (mysqli_affected_rows($conn) > 0) {
                echo "
                    <script>
                        alert('data berhasil diubah');
                        document.location.href = '../utama.php';
                    </script>
                ";
            }
            else{
                echo "
                    <script>
                        alert('data gagal diubah');
                        document.location.href = '../utama.php';
                    </script>
                ";
            }
        }

?>

<!DOCTYPE html>
<html>
<head>
        <title>Ubah Data Gunung Api</title>
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
                <h1 style="text-align: center;">Ubah Data Gunung Api</h1>
        </div>
        
        <div class="isi">
                <div class="isi2">
                    <?php while($row = mysqli_fetch_assoc($result)) :?>
                        <form action="" method="post">
                        
                                       <p><label for="nama">Nama Gunung Api </label></p> 
                                        <input type="text" name="nama" id="nama" required value="<?php echo $row["nama"];?>"> 
                             
                                        <p><label for="bentuk">Bentuk Gunung Api </label></p> 
                                        <input type="text" name="bentuk" id="bentuk"  required value="<?php echo $row["bentuk"];?>"> 
                               
                                        <p><label for="tinggi">Tinggi Gunung Api </label></p> 
                                        <input type="text" name="tinggi" id="tinggi"  required value="<?php echo $row["tinggi"];?>"> 
                              
                                        <p><label for="letusan_terakhir">Letusan Terakhir </label></p> 
                                        <input type="text" name="letusan_terakhir" id="letusan_terakhir" required value="<?php echo $row["letusan_terakhir"];?>"> 
                             
                                        <p><label for="gambar">Foto Gunung Api </label></p> 
                                        <input type="text" name="gambar" id="gambar" value="<?php echo $row["gambar"];?>"> 
                                        <input type="submit" name="submit" value="Ubah Data">
                      
                        </form>
                     <?php endwhile;?> 
                </div>
        </div>
        </header>
</body>
</html>

