<h1 class="mt-4 text-center">Ubah Peminjaman Buku</h1>
<div class="card shadow">
    <div class="card-body">
        <form method="post">
            <?php
                $id = $_GET['id'];
                if(isset($_POST['submit'])){
                    $id_buku = $_POST['id_buku'];
                    $id_user = $_SESSION['user']['id_user'];
                    $tanggal_peminjaman = $_POST['tanggal_peminjaman'];
                    $tanggal_pengembalian = $_POST['tanggal_pengembalian'];
                    $status_peminjaman = $_POST['status_peminjaman'];

                    $query = mysqli_query($koneksi, "UPDATE peminjaman 
                        SET id_buku='$id_buku', tanggal_peminjaman='$tanggal_peminjaman', 
                        tanggal_pengembalian='$tanggal_pengembalian', status_peminjaman='$status_peminjaman' 
                        WHERE id_peminjaman='$id'");

                    if($query) {
                        echo '<div class="alert alert-success" role="alert">Data berhasil diperbarui!</div>';
                    } else {
                        echo '<div class="alert alert-danger" role="alert">Gagal memperbarui data.</div>';
                    }
                }

                $query = mysqli_query($koneksi, "SELECT * FROM peminjaman WHERE id_peminjaman='$id'");
                $data = mysqli_fetch_array($query);
            ?>

            <div class="mb-3">
                <label class="form-label">Buku</label>
                <select name="id_buku" class="form-control">
                    <?php
                        $buk = mysqli_query($koneksi, "SELECT * FROM buku");
                        while($buku = mysqli_fetch_array($buk)) {
                    ?>
                        <option value="<?php echo $buku['id_buku']; ?>" 
                            <?php if($buku['id_buku'] == $data['id_buku']) echo 'selected'; ?>>
                            <?php echo $buku['judul']; ?>
                        </option>
                    <?php } ?>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Tanggal Peminjaman</label>
                <input type="date" class="form-control" value="<?php echo $data['tanggal_peminjaman']; ?>" name="tanggal_peminjaman" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Tanggal Pengembalian</label>
                <input type="date" class="form-control" value="<?php echo $data['tanggal_pengembalian']; ?>" name="tanggal_pengembalian" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Status Peminjaman</label>
                <select name="status_peminjaman" class="form-control">
                    <option value="dipinjam" <?php if($data['status_peminjaman'] == 'dipinjam') echo 'selected'; ?> class="text-warning">
                        Dipinjam
                    </option>
                    <option value="dikembalikan" <?php if($data['status_peminjaman'] == 'dikembalikan') echo 'selected'; ?> class="text-success">
                        Dikembalikan
                    </option>
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
