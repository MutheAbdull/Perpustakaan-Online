<h1 class="mt-4 text-primary"><i class="fas fa-book"></i> Kategori Buku</h1>
<div class="card shadow-lg">
    <div class="card-header bg-primary text-white">
        <h5 class="mb-0"><i class="fas fa-list"></i> Daftar Kategori</h5>
    </div>
    <div class="card-body">
        <div class="mb-3">
            <a href="?page=kategori_tambah" class="btn btn-success"><i class="fas fa-plus"></i> Tambah Kategori</a>
        </div>
        <div class="table-responsive">
            <table class="table table-hover table-striped" id="dataTable">
                <thead class="table-primary">
                    <tr>
                        <th>No</th>
                        <th>Nama Kategori</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    $query = mysqli_query($koneksi, "SELECT * FROM kategori");
                    while ($data = mysqli_fetch_array($query)) {
                    ?>
                    <tr>
                        <td><?php echo $i++; ?></td>
                        <td><?php echo htmlspecialchars($data['kategori']); ?></td>
                        <td class="text-center">
                            <a href="?page=kategori_ubah&id=<?php echo $data['id_kategori']; ?>" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i> Ubah
                            </a>
                            <a onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?');" 
                               href="?page=kategori_hapus&id=<?php echo $data['id_kategori']; ?>" 
                               class="btn btn-danger btn-sm">
                                <i class="fas fa-trash"></i> Hapus
                            </a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Tambahkan script DataTables untuk tampilan yang lebih interaktif -->
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#dataTable').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.13.4/i18n/Indonesian.json"
            }
        });
    });
</script>
