<h1 class="mt-4 text-primary"><i class="fas fa-file-alt"></i> Laporan Peminjaman Buku</h1>

<div class="card shadow-lg border-0">
    <div class="card-body">
        <div class="d-flex justify-content-between mb-3">
            <h5 class="fw-bold text-secondary">Data Peminjaman</h5>
            <a href="cetak.php" target="_blank" class="btn btn-primary">
                <i class="fas fa-print"></i> Cetak Data
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-hover table-striped align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>User</th>
                        <th>Buku</th>
                        <th>Tanggal Peminjaman</th>
                        <th>Tanggal Pengembalian</th>
                        <th>Status Peminjaman</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    $query = mysqli_query($koneksi, "SELECT * FROM peminjaman 
                        LEFT JOIN user ON user.id_user = peminjaman.id_user 
                        LEFT JOIN buku ON buku.id_buku = peminjaman.id_buku");
                    
                    while($data = mysqli_fetch_array($query)) {
                        $status = $data['status_peminjaman'];
                        $badgeClass = ($status == "Dipinjam") ? "badge bg-warning text-dark" :
                                      (($status == "Dikembalikan") ? "badge bg-success" : "badge bg-danger");
                    ?>
                    <tr>
                        <td><?php echo $i++; ?></td>
                        <td><?php echo htmlspecialchars($data['nama']); ?></td>
                        <td><?php echo htmlspecialchars($data['judul']); ?></td>
                        <td><?php echo date("d-m-Y", strtotime($data['tanggal_peminjaman'])); ?></td>
                        <td><?php echo ($data['tanggal_pengembalian'] ? date("d-m-Y", strtotime($data['tanggal_pengembalian'])) : "-"); ?></td>
                        <td><span class="<?php echo $badgeClass; ?>"><?php echo $status; ?></span></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
