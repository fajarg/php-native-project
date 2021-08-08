<?php 
require 'functions.php';

if( isset($_POST["register"]) ) {

    if( registrasi($_POST) > 0 ) {
        echo "<script>
                alert('user baru berhasil ditambahkan');
            </script>";
    }else {
        echo mysqli_error($conn);
    }

}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Registrasi</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="header">
        <div class="loginbox">
            <h1 class="h1_reg">Sign Up</h1>
            <form action="" method="post">
        
                    <div class="loginInput">
                        <label for="username">Username  </label>
                        <input type="text" name="username" id="username" placeholder="Masukan Username" autocomplete="off" required>
                    
            
                        <label for="password">Password  </label>
                        <input type="password" name="password" id="password" placeholder="Masukan Password" required><br>

                        <label for="password2">Konfirmasi Password  </label>
                        <input type="password" name="password2" id="password2" placeholder="Konfirmasi Password" required><br>
                    </div>
            
                    <div class="btn-button-reg">
                        <div class="buttons">
                            <button type="submit" name="login"><span></span>REGISTER</button>
                        </div>
                    </div>
                
    
            </form>
        </div>
    </div>
</body>
</html>