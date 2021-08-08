<?php
session_start();
include("header.php");
require 'functions.php';

// query data
$products = query("SELECT * FROM products");

// jika tombol cari ditekan
if (isset($_POST["cari"])) {
    $keyword = $_POST["keyword"];

    $products = cari($keyword);
    $_SESSION["keyword"] = $keyword;
}
?>

<div class="container">
    <!-- alert jika format tidak sesuai -->
    <?php if (isset($_SESSION["check"])) { ?>
        <div class="alert alert-danger" role="alert">
            Format pengisian tidak sesuai
        </div>
    <?php
        session_destroy();
        session_unset();
    }
    ?>
    <!-- alert jika berhasil menghapus data -->
    <?php if (isset($_SESSION["check_hapus"])) { ?>
        <div class="alert alert-success" role="alert">
            Berhasil menghapus data
        </div>
    <?php
        session_destroy();
        session_unset();
    }

    // jika tombol urutkan ditekan
    if (isset($_POST["btn_ascending"])) {
        if (isset($_SESSION["keyword"])) {
            $keyword = $_SESSION["keyword"];

            $products = query("SELECT * FROM products WHERE
            names LIKE '%$keyword%' OR
            price LIKE '%$keyword%' OR
            qty LIKE '%$keyword%' 
            ORDER BY price ASC
            ");
            session_destroy();
            session_unset();
        } else {
            $products = query("SELECT * FROM products ORDER BY price ASC");
            $_SESSION["urutkan_terkecil"] = true;
        }
    } else if (isset($_POST["btn_descending"])) {
        if (isset($_SESSION["keyword"])) {
            $keyword = $_SESSION["keyword"];

            $products = query("SELECT * FROM products WHERE
            names LIKE '%$keyword%' OR
            price LIKE '%$keyword%' OR
            qty LIKE '%$keyword%' 
            ORDER BY price DESC
            ");
            session_destroy();
            session_unset();
        } else {
            $products = query("SELECT * FROM products ORDER BY price DESC");
            $_SESSION["urutkan_terbesar"] = true;
        }
    }


    ?>
    <form method="post">
        <button type="submit" class="btn btn-primary" name="insert">Insert</button>
        <br><br>
    </form>
    <?php
    if (isset($_POST["insert"])) {
    ?>
        <form method="post" action="insert.php">
            <div class="mb-3">
                <label for="nama-produk" class="form-label">Nama produk</label>
                <input type="text" class="form-control" id="nama-produk" name="nama_produk" placeholder="Nama produk" required>
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <input type="text" class="form-control" id="harga" name="harga" placeholder="Harga" required>
            </div>
            <div class="mb-3">
                <label for="jumlah" class="form-label">Jumlah</label>
                <input type="text" class="form-control" id="jumlah" name="jumlah" placeholder="Jumlah" required>
            </div>

            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
        <br>
    <?php
    }
    ?>

    <table class="table table-striped text-center">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($products as $row) : ?>
                <tr>
                    <td><?= $i; ?></td>
                    <td><?= $row["names"] ?></td>
                    <td><?= $row["price"] ?></td>
                    <td><?= $row["qty"] ?></td>
                    <td>
                        <a href="form_update.php?id=<?= $row["product_id"]; ?>"><button type="button" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></button></a>

                        <a href="hapus.php?id=<?= $row["product_id"]; ?>" onclick="return confirm('apakah kamu yakin ingin menghapus data?')" ;><button type="button" class="btn btn-sm btn-danger"><i class="fa fa-trash-alt"></i></button></a>
                    </td>
                </tr>
                <?php $i++; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<br><br><br><br><br><br><br><br><br>
<?php include("footer.php"); ?>