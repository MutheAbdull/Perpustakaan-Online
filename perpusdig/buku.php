<h1 class="mt-4 text-primary"><i class="fas fa-book"></i> Daftar Buku</h1>

<div class="card shadow-lg border-0">
    <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><i class="fas fa-list"></i> Data Buku</h5>
        <a href="?page=buku_tambah" class="btn btn-light btn-sm">
            <i class="fas fa-plus-circle"></i> Tambah Buku
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead class="table-dark">
                    <tr class="text-center">
                        <th>No</th>
                        <th>Kategori</th>
                        <th>Judul</th>
                        <th>Penulis</th>
                        <th>Penerbit</th>
                        <th>Tahun</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    $query = mysqli_query($koneksi, "SELECT * FROM buku LEFT JOIN kategori ON buku.id_kategori = kategori.id_kategori");
                    while($data = mysqli_fetch_array($query)){
                    ?>
                    <tr>
                        <td class="text-center"><?php echo $i++; ?></td>
                        <td><?php echo $data['kategori']; ?></td>
                        <td><?php echo $data['judul']; ?></td>
                        <td><?php echo $data['penulis']; ?></td>
                        <td><?php echo $data['penerbit']; ?></td>
                        <td class="text-center"><?php echo $data['tahun_terbit']; ?></td>
                        <td>
                            <?php echo (strlen($data['deskripsi']) > 50) ? substr($data['deskripsi'], 0, 50) . '...' : $data['deskripsi']; ?>
                        </td>
                        <td class="text-center">
                            <a href="?page=buku_ubah&id=<?php echo $data['id_buku']; ?>" class="btn btn-info btn-sm">
                                <i class="fas fa-edit"></i> Ubah
                            </a>
                            <button onclick="hapusData(<?php echo $data['id_buku']; ?>)" class="btn btn-danger btn-sm">
                                <i class="fas fa-trash"></i> Hapus
                            </button>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function hapusData(id) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Data yang dihapus tidak bisa dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "?page=buku_hapus&id=" + id;
            }
        });
    }
</script>
