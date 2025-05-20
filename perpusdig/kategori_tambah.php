<h1 class="mt-4 text-primary"><i class="fas fa-plus-circle"></i> Tambah Kategori Buku</h1>

<div class="card shadow-lg border-0">
    <div class="card-header bg-success text-white">
        <h5 class="mb-0"><i class="fas fa-tags"></i> Form Tambah Kategori</h5>
    </div>
    <div class="card-body">
        <?php
        if(isset($_POST['submit'])) {
            $kategori = htmlspecialchars($_POST['kategori']);

            if (!empty($kategori)) {
                $query = mysqli_query($koneksi, "INSERT INTO kategori(kategori) VALUES('$kategori')");

                if ($query) {
                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fas fa-check-circle"></i> Data berhasil ditambahkan!
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>';
                    echo "<script>setTimeout(() => location.href='?page=kategori', 1500);</script>";
                } else {
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="fas fa-exclamation-triangle"></i> Gagal menambahkan data.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>';
                }
            } else {
                echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <i class="fas fa-exclamation-circle"></i> Nama kategori tidak boleh kosong!
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>';
            }
        }
        ?>

        <form method="post">
            <div class="mb-3 row">
                <label class="col-md-4 col-form-label fw-bold"><i class="fas fa-tag"></i> Nama Kategori</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" name="kategori" placeholder="Masukkan nama kategori" required>
                </div>
            </div>
            <div class="mb-3 row">
                <div class="col-md-4"></div>
                <div class="col-md-8">
                    <button type="submit" class="btn btn-success" name="submit" value="submit">
                        <i class="fas fa-save"></i> Simpan
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
