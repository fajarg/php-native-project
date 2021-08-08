<?php if (isset($_SESSION["check"])) { ?>
    <div class="alert alert-danger" role="alert">
        Format pengisian tidak sesuai
    </div>
<?php
    session_destroy();
    session_unset();
}
?>
<br>
<a href="<?= BASE_URL . 'index.php?r=home/insertbarang' ?>" class="btn btn-primary">Tambah data</a>
<br>
<br>
<table class="table">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Nama Barang</th>
            <th>QTY</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <?php foreach ($data as $item) : ?>
        <tr scope="row">
            <td><?= $item["id"] ?></td>
            <td><?= $item["nama"] ?></td>
            <td><?= $item["qty"] ?></td>
            <td><a href="<?= BASE_URL . 'index.php?r=home/updatebarang/' . $item['id'] ?>"><span class="badge bg-success">Update</span></a>
                <a href="<?= BASE_URL . 'index.php?r=home/deletebarang/' . $item['id'] ?>"><span class="badge bg-danger" onclick="return confirm('apakah yakin hapus data ini?')">Delete</span></a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>