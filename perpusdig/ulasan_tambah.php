<h1 class="mt-4 text-center">Tambah Ulasan Buku</h1>
<div class="card shadow-lg p-4">
    <div class="card-body">
        <form method="post">
            <?php
                if(isset($_POST['submit'])){
                    $id_buku = $_POST['id_buku'];
                    $id_user = $_SESSION['user']['id_user'];
                    $ulasan = $_POST['ulasan'];
                    $rating = $_POST['rating'];

                    $query = mysqli_query($koneksi, "INSERT INTO ulasan(id_buku, id_user, ulasan, rating) VALUES ('$id_buku','$id_user','$ulasan','$rating')");

                    if($query) {
                        echo '<script>alert("Tambah Data Berhasil.");</script>';
                    } else {
                        echo '<script>alert("Tambah Data Gagal.");</script>';
                    }
                }
            ?>

            <div class="mb-3">
                <label class="form-label fw-bold">Buku</label>
                <select name="id_buku" class="form-select">
                    <option selected disabled>Pilih Buku</option>
                    <?php
                        $buk = mysqli_query($koneksi, "SELECT * FROM buku");
                        while($buku = mysqli_fetch_array($buk)) {
                    ?>
                    <option value="<?php echo $buku['id_buku']; ?>">
                        <?php echo $buku['judul']; ?>
                    </option>
                    <?php } ?>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Ulasan</label>
                <textarea name="ulasan" rows="5" class="form-control" placeholder="Tulis ulasan Anda..."></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Rating</label>
                <select name="rating" class="form-select">
                    <option selected disabled>Pilih Rating</option>
                    <?php for($i = 1; $i <= 5; $i++) { ?>
                        <option value="<?php echo $i; ?>">
                            <?php echo str_repeat("⭐", $i) . " ($i)"; ?>
                        </option>
                    <?php } ?>
                </select>
            </div>

            <div class="d-flex justify-content-between">
                <a href="?page=ulasan" class="btn btn-danger btn-lg">
                    <i class="fa fa-arrow-left"></i> Kembali
                </a>
                <div>
                    <button type="reset" class="btn btn-secondary btn-lg">
                        <i class="fa fa-undo"></i> Reset
                    </button>
                    <button type="submit" class="btn btn-primary btn-lg" name="submit" value="submit">
                        <i class="fa fa-save"></i> Simpan
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
