<h1 class="mt-4 text-center">Peminjaman Buku</h1>
<div class="card shadow">
    <div class="card-body">
        <form method="post">
            <?php
                if(isset($_POST['submit'])){
                    $id_buku = $_POST['id_buku'];
                    $id_user = $_SESSION['user']['id_user'];
                    $tanggal_peminjaman = $_POST['tanggal_peminjaman'];
                    $tanggal_pengembalian = $_POST['tanggal_pengembalian'];
                    $status_peminjaman = $_POST['status_peminjaman'];

                    $query = mysqli_query($koneksi, "INSERT INTO peminjaman(id_buku, id_user, tanggal_peminjaman, tanggal_pengembalian, status_peminjaman) 
                        VALUES ('$id_buku', '$id_user', '$tanggal_peminjaman', '$tanggal_pengembalian', '$status_peminjaman')");

                    if($query) {
                        echo '<div class="alert alert-success" role="alert">Data berhasil ditambahkan!</div>';
                    } else {
                        echo '<div class="alert alert-danger" role="alert">Gagal menambahkan data.</div>';
                    }
                }
            ?>

            <div class="mb-3">
                <label class="form-label">Buku</label>
                <select name="id_buku" class="form-control">
                    <?php
                        $buk = mysqli_query($koneksi, "SELECT * FROM buku");
                        while($buku = mysqli_fetch_array($buk)) {
                    ?>
                        <option value="<?php echo $buku['id_buku']; ?>"><?php echo $buku['judul']; ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Tanggal Peminjaman</label>
                <input type="date" class="form-control" name="tanggal_peminjaman" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Tanggal Pengembalian</label>
                <input type="date" class="form-control" name="tanggal_pengembalian" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Status Peminjaman</label>
                <select name="status_peminjaman" class="form-control">
                    <option value="dipinjam" class="text-warning">Dipinjam</option>
                    <option value="dikembalikan" class="text-success">Dikembalikan</option>
                </select>
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-primary" name="submit">
                    <i class="fa fa-save"></i> Simpan
                </button>
                <button type="reset" class="btn btn-secondary">
                    <i class="fa fa-undo"></i> Reset
                </button>
                <a href="?page=peminjaman" class="btn btn-danger">
                    <i class="fa fa-arrow-left"></i> Kembali
                </a>
            </div>
        </form>
    </div>
</div>
