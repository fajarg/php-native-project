<?php 
//koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "mobil");


function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ( $row = mysqli_fetch_assoc($result) ) {
        $rows[] = $row;
    }
    return $rows;
};

function tambah($data) {
    global $conn;

    //ambil data dari elemen form
    $tipe_mobil = htmlspecialchars($data["tipe_mobil"]);
    $tahun = htmlspecialchars($data["tahun"]);
    $kode_mesin = htmlspecialchars($data["kode_mesin"]);
    

    // upload gambar
    $gambar = upload();
    if( !$gambar ) {
        return false;
    }

    $query = "INSERT INTO bmw
                VALUES
                ('', '$tipe_mobil', '$tahun', '$kode_mesin', '$gambar')
                ";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);

}


function upload() {
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    // cek apakah tidak ada gambar yang diupload 
    if( $error === 4 ) {
        echo "<script>
                alert('pilih gambar terlebih dahulu');
                </script>";
        return false;
    }

    // cek apakah yang diupload adalah gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if( !in_array($ekstensiGambar, $ekstensiGambarValid) ){
        echo "<script>
                alert('yang anda upload bukan gambar');
                </script>";
        return false;
    }

    // cek jika ukuran terlalu besar

    if( $ukuranFile > 1000000 ) {
        echo "<script>
                alert('ukuran gambar terlalu besar');
                </script>";
        return false;
    }


    // lolos pengecekan, gambar siap diupload

    // generate gambar baru

    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

    return $namaFileBaru;
}



function hapus($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM bmw WHERE id = $id");
    return mysqli_affected_rows($conn);
}



function ubah($data) {
    global $conn;

    //ambil data dari elemen form
    $id = $data["id"];
    $tipe_mobil = htmlspecialchars($data["tipe_mobil"]);
    $tahun = htmlspecialchars($data["tahun"]);
    $kode_mesin = htmlspecialchars($data["kode_mesin"]);
    $gambarLama = htmlspecialchars($data["gambarLama"]);


    // cek apakah user pilih gambar baru atau tidak
    if( $_FILES['gambar']['error'] === 4 ) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }
    

    $query = "UPDATE bmw SET
                tipe_mobil = '$tipe_mobil',
                tahun = '$tahun',
                kode_mesin = '$kode_mesin',
                gambar = '$gambar'
                WHERE id = $id
                ";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}



function cari($keyword) {
$jumlahDataPerHalaman = 4;
$jumlahData = count(query("SELECT * FROM bmw WHERE
                            tipe_mobil LIKE '%$keyword%' OR
                            tahun LIKE '%$keyword%' OR
                            kode_mesin LIKE '%$keyword%'"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
$halamanAktif = ( isset($_GET["halaman"]) ) ? $_GET["halaman"] : 1;
$awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;

    $query = "SELECT * FROM bmw 
                WHERE
                tipe_mobil LIKE '%$keyword%' OR
                tahun LIKE '%$keyword%' OR
                kode_mesin LIKE '%$keyword%' 
                LIMIT $awalData, $jumlahDataPerHalaman";
    
    return query($query);

    function data_cari($jumlahData){
        $jumlahData = count(query("SELECT * FROM bmw WHERE
                                tipe_mobil LIKE '%$keyword%' OR
                                tahun LIKE '%$keyword%' OR
                                kode_mesin LIKE '%$keyword%'"));
        
        return $jumlahData;
    }
}

function data_cari($keyword){
    $jumlahData = count(query("SELECT * FROM bmw WHERE
                            tipe_mobil LIKE '%$keyword%' OR
                            tahun LIKE '%$keyword%' OR
                            kode_mesin LIKE '%$keyword%'"));
    
    return $keyword;
}




function registrasi($data) {
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);



    // cek username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");

    if( mysqli_fetch_assoc($result) ) {
        echo "<script>
                alert('username sudah terdaftar');
                </script>
        ";
        return false;
    }

    // cek konfirmasi password 
    if( $password !== $password2 ) {
        echo "
            <script>
                alert('konfirmasi password tidak sesuai');
            </script>
        
        ";

        return false;
    }
    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    //tambahkan user baru ke database
    mysqli_query($conn, "INSERT INTO user VALUES('', '$username', '$password')");

    return mysqli_affected_rows($conn);
    

}
