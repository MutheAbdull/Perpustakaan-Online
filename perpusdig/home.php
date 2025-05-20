<h1 class="mt-4 text-center">Dashboard</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Dashboard</li>
</ol>

<div class="row">
    <!-- Total Kategori -->
    <div class="col-xl-3 col-md-6">
        <div class="card text-white bg-primary mb-4 shadow-lg">
            <div class="card-body d-flex align-items-center">
                <i class="fas fa-list fa-2x me-3"></i>
                <div>
                    <h4><?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM kategori")); ?></h4>
                    <p class="mb-0">Total Kategori</p>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-between align-items-center">
                <a class="small text-white stretched-link" href="#">Lihat Detail</a>
                <i class="fas fa-angle-right"></i>
            </div>
        </div>
    </div>

    <!-- Total Buku -->
    <div class="col-xl-3 col-md-6">
        <div class="card text-white bg-warning mb-4 shadow-lg">
            <div class="card-body d-flex align-items-center">
                <i class="fas fa-book fa-2x me-3"></i>
                <div>
                    <h4><?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM buku")); ?></h4>
                    <p class="mb-0">Total Buku</p>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-between align-items-center">
                <a class="small text-white stretched-link" href="#">Lihat Detail</a>
                <i class="fas fa-angle-right"></i>
            </div>
        </div>
    </div>

    <!-- Total Ulasan -->
    <div class="col-xl-3 col-md-6">
        <div class="card text-white bg-success mb-4 shadow-lg">
            <div class="card-body d-flex align-items-center">
                <i class="fas fa-comments fa-2x me-3"></i>
                <div>
                    <h4><?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM ulasan")); ?></h4>
                    <p class="mb-0">Total Ulasan</p>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-between align-items-center">
                <a class="small text-white stretched-link" href="#">Lihat Detail</a>
                <i class="fas fa-angle-right"></i>
            </div>
        </div>
    </div>

    <!-- Total User -->
    <div class="col-xl-3 col-md-6">
        <div class="card text-white bg-danger mb-4 shadow-lg">
            <div class="card-body d-flex align-items-center">
                <i class="fas fa-users fa-2x me-3"></i>
                <div>
                    <h4><?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM user")); ?></h4>
                    <p class="mb-0">Total User</p>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-between align-items-center">
                <a class="small text-white stretched-link" href="#">Lihat Detail</a>
                <i class="fas fa-angle-right"></i>
            </div>
        </div>
    </div>
</div>

<!-- Informasi Pengguna -->
<div class="card shadow-lg mt-4">
    <div class="card-body">
        <h5 class="card-title"><i class="fas fa-user-circle"></i> Informasi Pengguna</h5>
        <table class="table table-bordered table-striped table-hover">
            <tr>
                <td width="200"><strong>Nama</strong></td>
                <td width="1">:</td>
                <td><?php echo $_SESSION['user']['nama']; ?></td>
            </tr>
            <tr>
                <td width="200"><strong>Level User</strong></td>
                <td width="1">:</td>
                <td><?php echo ucfirst($_SESSION['user']['level']); ?></td>
            </tr>
            <tr>
                <td width="200"><strong>Tanggal Login</strong></td>
                <td width="1">:</td>
                <td><?php echo date('l, d F Y'); ?></td>
            </tr>
        </table>
    </div>
</div>
