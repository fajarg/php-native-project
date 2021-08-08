<?php
//koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "db_product");



function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
};



function tambah($data)
{
    global $conn;

    //ambil data dari elemen form
    $nama_produk = htmlspecialchars($data["nama_produk"]);
    $harga = htmlspecialchars($data["harga"]);
    $jumlah = htmlspecialchars($data["jumlah"]);

    // validasi data 
    function validasi($nama_produk, $harga, $jumlah)
    {
        if (!preg_match("/^[a-zA-Z ]*$/", $nama_produk) || !preg_match("/^[0-9]*$/", $harga) || !preg_match("/^[0-9]*$/", $jumlah)) {
            $_SESSION["check"] = false;
            header("Location: index.php");
            exit;
        }
    }

    validasi($nama_produk, $harga, $jumlah);

    $query = "INSERT INTO products
                VALUES
                (NULL, '$nama_produk', '$harga', '$jumlah')
                ";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}



function hapus($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM products WHERE product_id = $id");
    return mysqli_affected_rows($conn);
}



function validasi_update($nama_produk, $harga, $jumlah)
{
    $pesan_error = array();


    if (!preg_match("/^[a-zA-Z]*$/", $nama_produk)) {
        $_SESSION["check_error"] = true;
        $pesan_error[] = "Nama produk harus berupa string";
    }
    if (!preg_match("/^[0-9]*$/", $harga)) {
        $_SESSION["check_error"] = true;
        $pesan_error[] = "Harga harus berupa integer";
    }
    if (!preg_match("/^[0-9]*$/", $jumlah)) {
        $_SESSION["check_error"] = true;
        $pesan_error[] = "Jumlah harus berupa integer";
    }

    return $pesan_error;
}



function ubah($data)
{
    global $conn;

    //ambil data dari elemen form
    $id = $data["id"];
    $nama_produk = htmlspecialchars($data["nama_produk"]);
    $harga = htmlspecialchars($data["harga"]);
    $jumlah = htmlspecialchars($data["jumlah"]);


    $query = "UPDATE products SET
    names = '$nama_produk',
    price = '$harga',
    qty = '$jumlah'
    WHERE product_id = $id
    ";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function cari($keyword)
{
    if (isset($_SESSION["urutkan_terbesar"])) {
        $query = "SELECT * FROM products 
        WHERE
        names LIKE '%$keyword%' OR
        price LIKE '%$keyword%' OR
        qty LIKE '%$keyword%' 
        ORDER BY price DESC";

        session_unset();
        session_destroy();
    } else if (isset($_SESSION["urutkan_terkecil"])) {
        $query = "SELECT * FROM products 
        WHERE
        names LIKE '%$keyword%' OR
        price LIKE '%$keyword%' OR
        qty LIKE '%$keyword%' 
        ORDER BY price ASC";

        session_unset();
        session_destroy();
    } else {
        $query = "SELECT * FROM products 
        WHERE
        names LIKE '%$keyword%' OR
        price LIKE '%$keyword%' OR
        qty LIKE '%$keyword%'
        ";
    }


    return query($query);
}
