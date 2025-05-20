<h1 class="mt-4 text-primary"><i class="fas fa-edit"></i> Ubah Kategori Buku</h1>

<div class="card shadow-lg border-0">
    <div class="card-header bg-warning text-white">
        <h5 class="mb-0"><i class="fas fa-pencil-alt"></i> Edit Kategori</h5>
    </div>
    <div class="card-body">
        <?php
        $id = $_GET['id'];
        if (isset($_POST['submit'])) {
            $kategori = htmlspecialchars($_POST['kategori']);
            $query = mysqli_query($koneksi, "UPDATE kategori SET kategori='$kategori' WHERE id_kategori='$id'");

            if ($query) {
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fas fa-check-circle"></i> Data berhasil diperbarui!
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>';
                echo "<script>setTimeout(() => location.href='?page=kategori', 1500);</script>";
            } else {
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="fas fa-exclamation-triangle"></i> Gagal memperbarui data.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>';
            }
        }

        $query = mysqli_query($koneksi, "SELECT * FROM kategori WHERE id_kategori='$id'");
        $data = mysqli_fetch_array($query);
        ?>

        <form method="post" onsubmit="return confirm('Apakah Anda yakin ingin menyimpan perubahan ini?')">
            <div class="mb-3 row">
                <label class="col-md-4 col-form-label fw-bold"><i class="fas fa-tag"></i> Nama Kategori</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" value="<?php echo htmlspecialchars($data['kategori']); ?>" name="kategori" required>
                </div>
            </div>
            <div class="mb-3 row">
                <div class="col-md-4"></div>
                <div class="col-md-8">
                    <button type="submit" class="btn btn-success" name="submit" value="submit">
                        <i class="fas fa-save"></i> Simpan Perubahan
                    </button>
                    <button type="reset" class="btn btn-secondary">
                        <i class="fas fa-undo"></i> Reset
                    </button>
                    <a href="?page=kategori" class="btn btn-danger">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>
