<?php
session_start();
include("header.php");
require 'functions.php';

// ambil data di url
$id = $_GET["id"];

// query data berdasarkan id
$data = query("SELECT * FROM products WHERE product_id = $id")[0];
?>




<?php
//cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {
    // ambil data untuk validasi
    $nama_produk = htmlspecialchars($_POST["nama_produk"]);
    $harga = htmlspecialchars($_POST["harga"]);
    $jumlah = htmlspecialchars($_POST["jumlah"]);

    //validasi
    $pesan = validasi_update($nama_produk, $harga, $jumlah);

    if (isset($_SESSION["check_error"])) {
        foreach ($pesan as $items) {
?>
            <div class="container">
                <div class="alert alert-danger" role="alert">

                    <?php echo $items . "<br>"; ?>
                </div>
            </div>
<?php
        }
        session_destroy();
        session_unset();
        exit;
    }

    if (ubah($_POST) > 0) {
        echo "
            <script>
                alert('data berhasil diubah');
                document.location.href = 'index.php';
            </script> 
        ";
    } else {
        echo "
                <script>
                    document.location.href = 'index.php';
                </script> 
            ";
    }
}
?>


<div class="container">
    <h1 class="display-6">Ubah data</h1><br>
    <form method="post" action="">
        <input type="hidden" name="id" value="<?= $data["product_id"]; ?>">
        <div class="mb-3">
            <label for="nama-produk" class="form-label">Nama produk</label>
            <input type="text" class="form-control" id="nama-produk" name="nama_produk" placeholder="Nama produk" value="<?= $data["names"]; ?>" required autocomplete="off">
        </div>
        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="text" class="form-control" id="harga" name="harga" placeholder="Harga" value="<?= $data["price"]; ?>" required autocomplete="off">
        </div>
        <div class="mb-3">
            <label for="jumlah" class="form-label">Jumlah</label>
            <input type="text" class="form-control" id="jumlah" name="jumlah" placeholder="Jumlah" value="<?= $data["qty"]; ?>" required autocomplete="off">
        </div>
        <br>
        <button type="submit" class="btn btn-primary" name="submit">Ubah data</button>
    </form>
    <br>
</div>

<br><br><br><br><br><br><br><br><br>
<?php include("footer.php"); ?>