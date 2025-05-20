<?php
    include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Register - Perpustakaan Online</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <style>
            body {
                background: linear-gradient(135deg, #4A90E2, #50C9C3);
                height: 100vh;
                display: flex;
                justify-content: center;
                align-items: center;
            }
            .register-container {
                width: 100%;
                max-width: 500px;
            }
            .card {
                border-radius: 15px;
                box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
            }
            .btn-primary {
                background-color: #007bff;
                border: none;
                transition: 0.3s;
            }
            .btn-primary:hover {
                background-color: #0056b3;
                transform: scale(1.05);
            }
            .btn-danger:hover {
                transform: scale(1.05);
            }
        </style>
    </head>
    <body>
        <div class="container register-container">
            <div class="card">
                <div class="card-header text-center bg-primary text-white">
                    <h3><i class="fas fa-user-plus"></i> Register Perpustakaan</h3>
                </div>
                <div class="card-body">
                    <?php
                        if(isset($_POST['register'])){
                            $nama = htmlspecialchars($_POST['nama']);
                            $email = htmlspecialchars($_POST['email']);
                            $alamat = htmlspecialchars($_POST['alamat']);
                            $no_telepon = htmlspecialchars($_POST['no_telepon']);
                            $username = htmlspecialchars($_POST['username']);
                            $level = $_POST['level'];
                            $password = md5($_POST['password']);  
                        
                            $insert = mysqli_query($koneksi, "INSERT INTO user(nama, email, alamat, no_telepon, username, password, level) 
                                                              VALUES('$nama', '$email', '$alamat', '$no_telepon', '$username', '$password', '$level')");
                        
                            if($insert){
                                echo '<div class="alert alert-success">Registrasi berhasil! Mengalihkan ke login...</div>';
                                echo '<script>setTimeout(function(){ location.href="login.php"; }, 1500);</script>';
                            } else {
                                echo '<div class="alert alert-danger">Registrasi gagal, coba lagi!</div>';
                            }
                        }
                    ?>
                    <form method="post">
                        <div class="form-floating mb-3">
                            <input class="form-control" type="text" required name="nama" placeholder="Masukkan Nama Lengkap" />
                            <label><i class="fas fa-user"></i> Nama Lengkap</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" type="email" required name="email" placeholder="Masukkan Email" />
                            <label><i class="fas fa-envelope"></i> Email</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" type="text" required name="no_telepon" placeholder="Masukkan No. Telp" />
                            <label><i class="fas fa-phone"></i> No. Telepon</label>
                        </div>
                        <div class="form-floating mb-3">
                            <textarea name="alamat" rows="3" required class="form-control" placeholder="Masukkan Alamat"></textarea>
                            <label><i class="fas fa-map-marker-alt"></i> Alamat</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" type="text" required name="username" placeholder="Masukkan Username" />
                            <label><i class="fas fa-user"></i> Username</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" type="password" required name="password" placeholder="Masukkan Password" />
                            <label><i class="fas fa-lock"></i> Password</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select name="level" required class="form-control">
                                <option value="peminjam">Peminjam</option> 
                                <option value="admin">Admin</option>
                            </select>
                            <label><i class="fas fa-user-tag"></i> Level</label>
                        </div>
                        <div class="d-flex justify-content-between">
                            <button class="btn btn-primary px-4" type="submit" name="register"><i class="fas fa-user-plus"></i> Register</button>
                            <a class="btn btn-danger px-4" href="login.php"><i class="fas fa-sign-in-alt"></i> Login</a>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-center">
                    <small>&copy; 2025 Perpustakaan Online</small>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
