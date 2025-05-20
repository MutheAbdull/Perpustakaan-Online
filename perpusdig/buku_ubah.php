<h1 class="mt-4 text-primary"><i class="fas fa-edit"></i> Ubah Data Buku</h1>

<div class="card shadow-lg border-0">
    <div class="card-body">
        <form method="post">
            <?php
                $id = $_GET['id']; 
                if(isset($_POST['submit'])) {
                    $id_kategori = $_POST['id_kategori'];
                    $judul = $_POST['judul'];
                    $penulis = $_POST['penulis'];
                    $penerbit = $_POST['penerbit'];
                    $tahun_terbit = $_POST['tahun_terbit'];
                    $deskripsi = $_POST['deskripsi'];

                    $query = mysqli_query($koneksi, "UPDATE buku SET id_kategori= '$id_kategori', judul='$judul', penulis='$penulis', penerbit='$penerbit', tahun_terbit='$tahun_terbit', deskripsi='$deskripsi' WHERE id_buku=$id");

                    if($query) {
                        echo '<script>
                            Swal.fire({
                                icon: "success",
                                title: "Berhasil!",
                                text: "Data buku berhasil diubah.",
                                confirmButtonColor: "#3085d6",
                                confirmButtonText: "OK"
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = "?page=buku";
                                }
                            });
                        </script>';
                    } else {
                        echo '<script>
                            Swal.fire({
                                icon: "error",
                                title: "Gagal!",
                                text: "Terjadi kesalahan saat mengubah data.",
                            });
                        </script>';
                    }
                }
                $query = mysqli_query($koneksi, "SELECT * FROM buku WHERE id_buku=$id");
                $data = mysqli_fetch_array($query);
            ?>
            <div class="row mb-3">
                <label class="col-md-3 col-form-label fw-bold">Kategori</label>
                <div class="col-md-9">
                    <select name="id_kategori" class="form-select">
                        <?php
                            $kat = mysqli_query($koneksi, "SELECT * FROM kategori");
                            while ($kategori = mysqli_fetch_array($kat)) {
                        ?>
                            <option <?php if ($kategori['id_kategori'] == $data['id_kategori']) echo 'selected'; ?> 
                                value="<?php echo $kategori['id_kategori']; ?>">
                                <?php echo $kategori['kategori']; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-md-3 col-form-label fw-bold">Judul</label>
                <div class="col-md-9">
                    <input type="text" value="<?php echo $data['judul']; ?>" class="form-control" name="judul" required>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-md-3 col-form-label fw-bold">Penulis</label>
                <div class="col-md-9">
                    <input type="text" value="<?php echo $data['penulis']; ?>" class="form-control" name="penulis" required>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-md-3 col-form-label fw-bold">Penerbit</label>
                <div class="col-md-9">
                    <input type="text" value="<?php echo $data['penerbit']; ?>" class="form-control" name="penerbit" required>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-md-3 col-form-label fw-bold">Tahun Terbit</label>
                <div class="col-md-9">
                    <input type="number" value="<?php echo $data['tahun_terbit']; ?>" class="form-control" name="tahun_terbit" required>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-md-3 col-form-label fw-bold">Deskripsi</label>
                <div class="col-md-9">
                    <textarea name="deskripsi" rows="5" class="form-control" required><?php echo $data['deskripsi']; ?></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-9">
                    <button type="submit" class="btn btn-primary" name="submit" value="submit">
                        <i class="fas fa-save"></i> Simpan
                    </button>
                    <button type="reset" class="btn btn-secondary">
                        <i class="fas fa-undo"></i> Reset
                    </button>
                    <a href="?page=buku" class="btn btn-danger">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
