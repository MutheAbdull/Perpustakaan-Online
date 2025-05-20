<h1 class="mt-4 text-center">Edit Ulasan Buku</h1>
<div class="card shadow">
    <div class="card-body">
        <form method="post">
            <?php
            $id = $_GET['id']; 
            if(isset($_POST['submit'])){
                $id_buku = $_POST['id_buku'];
                $id_user = $_SESSION['user']['id_user'];
                $ulasan = $_POST['ulasan'];
                $rating = $_POST['rating'];
                
                $query = mysqli_query($koneksi, "UPDATE ulasan SET id_buku='$id_buku', ulasan='$ulasan', rating='$rating' WHERE id_ulasan=$id");
                if($query) {
                    echo '<script>alert("Ubah Data Berhasil.");</script>';
                } else {
                    echo '<script>alert("Ubah Data Gagal.");</script>';
                }
            }
            
            $query = mysqli_query($koneksi, "SELECT * FROM ulasan WHERE id_ulasan=$id");
            $data = mysqli_fetch_array($query);
            ?>

            <div class="mb-3">
                <label class="form-label fw-bold">Buku</label>
                <select name="id_buku" class="form-control">
                    <?php
                        $buk = mysqli_query($koneksi, "SELECT * FROM buku");
                        while($buku = mysqli_fetch_array($buk)) {
                    ?>
                    <option <?php if($data['id_buku'] == $buku['id_buku']) echo 'selected'; ?> 
                            value="<?php echo $buku['id_buku']; ?>">
                        <?php echo $buku['judul']; ?>
                    </option>
                    <?php } ?>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Ulasan</label>
                <textarea name="ulasan" rows="5" class="form-control"><?php echo htmlspecialchars($data['ulasan']); ?></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Rating</label>
                <select name="rating" class="form-control">
                    <?php for($i = 1; $i <= 5; $i++) { ?>
                        <option <?php if($data['rating'] == $i) echo 'selected'; ?> value="<?php echo $i; ?>">
                            <?php echo str_repeat("⭐", $i) . " ($i)"; ?>
                        </option>
                    <?php } ?>
                </select>
            </div>

            <div class="d-flex justify-content-between">
                <a href="?page=ulasan" class="btn btn-danger">
                    <i class="fa fa-arrow-left"></i> Kembali
                </a>
                <div>
                    <button type="reset" class="btn btn-secondary">
                        <i class="fa fa-undo"></i> Reset
                    </button>
                    <button type="submit" class="btn btn-primary" name="submit" value="submit">
                        <i class="fa fa-save"></i> Simpan
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
