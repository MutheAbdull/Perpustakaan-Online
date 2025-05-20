<h1 class="mt-4 text-center">Ulasan Buku</h1>
<div class="card shadow">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="card-title">Daftar Ulasan</h5>
            <a href="?page=ulasan_tambah" class="btn btn-primary">
                <i class="fa fa-plus"></i> Tambah Ulasan
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="table-primary">
                    <tr class="text-center">
                        <th>No</th>
                        <th>User</th>
                        <th>Buku</th>
                        <th>Ulasan</th>
                        <th>Rating</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    $query = mysqli_query($koneksi, "SELECT * FROM ulasan 
                        LEFT JOIN user ON user.id_user = ulasan.id_user 
                        LEFT JOIN buku ON buku.id_buku = ulasan.id_buku");
                    
                    while($data = mysqli_fetch_array($query)) {
                    ?>
                    <tr>
                        <td class="text-center"><?php echo $i++; ?></td>
                        <td><?php echo htmlspecialchars($data['nama']); ?></td>
                        <td><?php echo htmlspecialchars($data['judul']); ?></td>
                        <td><?php echo nl2br(htmlspecialchars($data['ulasan'])); ?></td>
                        <td class="text-center">
                            <span class="badge bg-warning text-dark">
                                <i class="fa fa-star"></i> <?php echo $data['rating']; ?>
                            </span>
                        </td>
                        <td class="text-center">
                            <a href="?page=ulasan_ubah&id=<?php echo $data['id_ulasan']; ?>" class="btn btn-sm btn-info">
                                <i class="fa fa-edit"></i> Ubah
                            </a>
                            <a onclick="return confirm('Apakah Anda yakin menghapus ulasan ini?');" 
                               href="?page=ulasan_hapus&id=<?php echo $data['id_ulasan']; ?>" 
                               class="btn btn-sm btn-danger">
                                <i class="fa fa-trash"></i> Hapus
                            </a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
