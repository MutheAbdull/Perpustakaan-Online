<h1 class="mt-4 text-primary"><i class="fas fa-book"></i> Tambah Buku</h1>

<div class="card shadow-lg border-0">
    <div class="card-body">
        <form method="post">
            <?php
                if(isset($_POST['submit'])) {
                    $id_kategori = $_POST['id_kategori'];
                    $judul = $_POST['judul'];
                    $penulis = $_POST['penulis'];
                    $penerbit = $_POST['penerbit'];
                    $tahun_terbit = $_POST['tahun_terbit'];
                    $deskripsi = $_POST['deskripsi'];

                    $query = mysqli_query($koneksi, "INSERT INTO buku(id_kategori,judul,penulis,penerbit,tahun_terbit,deskripsi) 
                    VALUES ('$id_kategori', '$judul', '$penulis', '$penerbit', '$tahun_terbit', '$deskripsi')");

                    if($query) {
                        echo '<script>
                            Swal.fire({
                                icon: "success",
                                title: "Berhasil!",
                                text: "Data buku berhasil ditambahkan.",
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
                                text: "Terjadi kesalahan saat menambahkan data.",
                            });
                        </script>';
                    }
                }
            ?>
            <div class="row mb-3">
                <label class="col-md-3 col-form-label fw-bold">Kategori</label>
                <div class="col-md-9">
                    <select name="id_kategori" class="form-select">
                        <option value="" selected disabled>Pilih Kategori</option>
                        <?php
                            $kat = mysqli_query($koneksi, "SELECT * FROM kategori");
                            while($kategori = mysqli_fetch_array($kat)) {
                        ?>
                            <option value="<?php echo $kategori['id_kategori']; ?>">
                                <?php echo $kategori['kategori']; ?>
                            </option>
                        <?php
                            }
                        ?>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-md-3 col-form-label fw-bold">Judul</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" name="judul" placeholder="Masukkan judul buku" required>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-md-3 col-form-label fw-bold">Penulis</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" name="penulis" placeholder="Masukkan nama penulis" required>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-md-3 col-form-label fw-bold">Penerbit</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" name="penerbit" placeholder="Masukkan penerbit buku" required>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-md-3 col-form-label fw-bold">Tahun Terbit</label>
                <div class="col-md-9">
                    <input type="number" class="form-control" name="tahun_terbit" placeholder="Masukkan tahun terbit" required>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-md-3 col-form-label fw-bold">Deskripsi</label>
                <div class="col-md-9">
                    <textarea name="deskripsi" rows="5" class="form-control" placeholder="Masukkan deskripsi buku" required></textarea>
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
