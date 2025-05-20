<h1 class="mt-4 text-center">Laporan Peminjaman Buku</h1>
<div class="card shadow">
    <div class="card-body">
        <div class="d-flex justify-content-between mb-3">
            <h5 class="card-title">Daftar Peminjaman</h5>
            <a href="?page=peminjaman_tambah" class="btn btn-primary">
                <i class="fa fa-plus"></i> Tambah Peminjaman
            </a>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>User</th>
                        <th>Buku</th>
                        <th>Tanggal Peminjaman</th>
                        <th>Tanggal Pengembalian</th>
                        <th>Status Peminjaman</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    $query = mysqli_query($koneksi, "SELECT * FROM peminjaman 
                        LEFT JOIN user ON user.id_user = peminjaman.id_user 
                        LEFT JOIN buku ON buku.id_buku = peminjaman.id_buku");
                    while($data = mysqli_fetch_array($query)){
                    ?>
                    <tr>
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $data['nama']; ?></td>
                        <td><?php echo $data['judul']; ?></td>
                        <td><?php echo date("d-m-Y", strtotime($data['tanggal_peminjaman'])); ?></td>
                        <td><?php echo date("d-m-Y", strtotime($data['tanggal_pengembalian'])); ?></td>
                        <td>
                            <?php 
                                if($data['status_peminjaman'] == 'dipinjam'){
                                    echo '<span class="badge bg-warning">Dipinjam</span>';
                                } elseif ($data['status_peminjaman'] == 'dikembalikan'){
                                    echo '<span class="badge bg-success">Dikembalikan</span>';
                                } else {
                                    echo '<span class="badge bg-danger">Terlambat</span>';
                                }
                            ?>
                        </td>
                        <td>
                            <?php if($data['status_peminjaman'] != 'dikembalikan'){ ?>
                                <a href="?page=peminjaman_ubah&id=<?php echo $data['id_peminjaman']; ?>" class="btn btn-sm btn-info">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a onclick="return confirm('Apakah anda yakin menghapus data ini?');" 
                                   href="?page=peminjaman_hapus&id=<?php echo $data['id_peminjaman']; ?>" 
                                   class="btn btn-sm btn-danger">
                                    <i class="fa fa-trash"></i>
                                </a>
                            <?php } ?>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Tambahkan DataTables -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        $('#dataTable').DataTable({
            "language": {
                "search": "Cari:",
                "lengthMenu": "Tampilkan _MENU_ data",
                "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                "paginate": {
                    "next": "Berikutnya",
                    "previous": "Sebelumnya"
                }
            }
        });
    });
</script>
