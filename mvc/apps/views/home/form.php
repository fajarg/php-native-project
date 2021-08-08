<form method="post">
    <?php if (isset($data['id'])) : ?>
        <input type="hidden" name="id" value="<?= isset($data['id']) ? $data['id'] : "" ?>">
    <?php endif ?>
    <div class="mb-3">
        <label for="namaInput" class="form-label">Nama barang</label>
        <input type="text" name="nama" class="form-control" id="namaInput" value="<?= isset($data['nama']) ? $data['nama'] : "" ?>" required>
    </div>
    <div class="mb-3">
        <label for="jumlahInput" class="form-label">Jumlah</label>
        <input type="text" name="qty" class="form-control" id="jumlahInput" value="<?= isset($data['qty']) ? $data['qty'] : "" ?>" required>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>