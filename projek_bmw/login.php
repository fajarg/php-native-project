<?php
session_start();
require 'functions.php';


// cek cookie

if( isset($_COOKIE['id']) && isset($_COOKIE['key']) ) {
    $id = $_COOKIE['id'];
    $key = $_COOKIE['key'];

    //ambil username berdasar id
    $result = mysqli_query($conn, "SELECT username FROM user WHERE id = $id");

    $row = mysqli_fetch_assoc($result);

    // cek cookie dan username 
    if( $key === hash('sha256', $row['username']) ) {
        $_SESSION['login'] = true;
    }
}

if( isset($_SESSION["login"]) ) {
    header("Location: utama.php");
    exit;
}




if( isset($_POST["login"]) ) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE username ='$username'");

    // cek username 
    if( mysqli_num_rows($result) === 1) {

        // cek password 
        $row = mysqli_fetch_assoc($result);
        if( password_verify($password, $row["password"]) ){
            // set session

            $_SESSION["login"] = true;
            $_SESSION["keyword"] = '';


            // cek remember me
            if( isset($_POST["remember"]) ) {
                // buat cookie
                setcookie('id', $row['id'], time() + 60);
                setcookie('key', hash('sha256', $row['username']), time() + 60);
            }

            header("location: utama.php");
            exit;
        }


    }

    $error = true;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="header">
        <div class="loginbox">
            <h1 class="h1_login">Login</h1>
            <?php if( isset($error) ) : ?>

                <p style="color : red;">username / password salah </p>
    
            <?php  endif; ?>
            <form action="" method="post">
        
                    <div class="loginInput">
                        <label for="username">Username  </label>
                        <input type="text" name="username" id="username" placeholder="Masukan Username" autocomplete="off">
                    
            
                        <label for="password">Password  </label>
                        <input type="password" name="password" id="password" placeholder="Masukan Password"><br>
                    </div>
            
                        <input type="checkbox" name="remember" id="remember">
                        <label for="remember">Remember me</label> 
                    <div class="btn-button">
                        <div class="buttons">
                            <button type="submit" name="login"><span></span>LOGIN</button>
                        </div>
                    </div>
                
    
            </form>
        </div>
    </div>
</body>
</html>