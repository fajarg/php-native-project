<?php
require 'function.php';
       $conn = mysqli_connect("localhost","root","","db_gunung");
	   $result = mysqli_query($conn, "SELECT * FROM tb_gunung");

       if (isset($_POST["cari"])) {
           $result = cari($_POST["keyword"]);
       }
?>
<!DOCTYPE html>
<html>
<head>
        <title>Gunung Api Indonesia</title>
        <link rel="stylesheet" type="text/css" href="style2.css">
        <style type="text/css">
            .tb{
                    position: absolute;
                    top: 118px;
                    left: 174px;
                    
                    color: white;
                    opacity: 0.8;
                }
             .coki{
                    position: absolute;
                    top: 0px;
                    left: 0px;
                    
                    color: black;
                    opacity: 0.7;
                    }
            .container{
                    width: 800px;
                    height: 100px;
                    
                    position: absolute;
                    top: 230px;
                    left: 177px;

            }
            body{
                    background-image:linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)), url("d.jpg");
                    height: 130vh;
                    background-color: white;
                    background-size: cover;
                    background-position: center bottom;
                    font-family: arial;
                }
            .btn{
                    
                    padding: 10px 20px;
                    color: black;
                    text-decoration: none;
                    transition: 0.6s;
                }
            .btn:hover{
                    background-color: black;
                    color: white;
                }
            .main{
                font-size: 15px;

            }
            .main input[type="submit"]
                {
                    border: none;
                    outline: none;
                    padding: 5px 20px;
                    color: white;
                    text-decoration: none;
                    transition: 0.6s; 
                    font-size: 16px;
                    font-family: century gothic;
                    background: transparent;

                }
            .main input[type="submit"]:hover{
                    background-color: white;
                    color: black;
            }
            .main input{
                    border: 1px solid white;
                    outline: 1px solid white;
                    //background: transparent;
                    display: inline-block;
                    font-size: 16px;
                    padding: 5px 20px;
            }
            ul{
                    list-style-type: none;
                    float: right;
                    margin-top: 20px;
                }

            ul li{
                display:inline-block;
            }

            ul li a{
                text-decoration: none;
                color: white;
                padding:5px 30px;
                border: 1px solid transparent;
                transition: 0.6s;
            }
            ul li a:hover{
                background-color: white;
                color: black;
            }
            ul li.active a{
                background-color: white;
                color: black;
            }
        </style>
       

</head>
<body>
        <header>
                <div class="main">
                        <ul>
                                <li><a href="home" class="active"><p style="font-family: century gothic">Tambah Gunung</a></li>
                                <li>
                                    <form action="" method="post">
                                        <input type="text" name="keyword" placeholder="cari data.." autocomplete="off">
                                        <input type="submit" name="cari" value="cari">
                                    </form>

                                </li>                  
                        </ul>   
        </div>
        <div class="tb">
                <table border="0" width="1003px" height="100px">
                        <tr bgcolor="black">
                                <th align="center">
                                    Daftar Gunung Api Indonesia
                                </th>
                               
                        </tr>
                </table>
          </div>
          <div class="container">
                <div class="coki">
                    <table border="0" width="997px" height="100px" bgcolor="white" cellpadding="4" cellspacing="4">
                        <tr style="color: white " bgcolor="black" >
                                <th>Nama</th>
                                <th>Bentuk</th>
                                <th>Tinggi</th>
                                <th>Letusan Terakhir</th>
                                <th>Gambar</th>
                                <th>Aksi</th>
                        </tr>
                        <?php while($row = mysqli_fetch_assoc($result)) :?>
                        <tr align="center">
                                <td><?php echo $row["nama"];?></td>
                                <td><?php echo $row["bentuk"];?></td>
                                <td><?php echo $row["tinggi"];?></td>
                                <td><?php echo $row["letusan_terakhir"];?></td>
                                <td><img src ="gmbr/<?php echo $row["gambar"];?>" width="120"</td>
                                <td>
                                    <a href = "ubah/ubah.php?id=<?php echo $row["id"];?>" class ="btn">Ubah</a>  |  
                                    <a href = "hapus/hapus.php?id=<?php echo $row["id"];?>" onclick="return confirm('apakah anda yakin ingin menghapus data?');" class ="btn">Hapus</a> 
                                </td>
                        </tr>             
                        <?php endwhile;?>
                     </table>
              
                </div>
          </div>
          

        </header>
</body>
</html>