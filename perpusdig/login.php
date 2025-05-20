<?php
    include "koneksi.php";

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
?>

<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Login - Perpustakaan Online</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <style>
            body {
                background: linear-gradient(135deg, #4A90E2, #50C9C3);
                height: 100vh;
            }
            .login-container {
                margin-top: 8%;
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
            .btn-danger {
                transition: 0.3s;
            }
            .btn-danger:hover {
                background-color: #a94442;
                transform: scale(1.05);
            }
        </style>
    </head>
    <body>
        <div class="container login-container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header text-center bg-primary text-white">
                            <h3><i class="fas fa-book"></i> Login Perpustakaan Online</h3>
                        </div>
                        <div class="card-body">
                            <?php
                                if(isset($_POST['login'])){
                                    $username = htmlspecialchars($_POST['username']);
                                    $password = md5($_POST['password']);

                                    $query = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' AND password='$password'");
                                    $data = mysqli_fetch_array($query);

                                    if($data){
                                        $_SESSION['user'] = $data;
                                        echo '<div class="alert alert-success">Login berhasil! Mengalihkan...</div>';
                                        echo '<script>setTimeout(function(){ location.href="index.php"; }, 1500);</script>';
                                    } else {
                                        echo '<div class="alert alert-danger">Username atau password salah!</div>';
                                    }
                                }
                            ?>
                            <form method="post">
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="username" type="text" name="username" placeholder="Masukkan username" required />
                                    <label for="username"><i class="fas fa-user"></i> Username</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="password" name="password" type="password" placeholder="Masukkan password" required />
                                    <label for="password"><i class="fas fa-lock"></i> Password</label>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <button class="btn btn-primary px-4" type="submit" name="login" value="login"><i class="fas fa-sign-in-alt"></i> Login</button>
                                    <a class="btn btn-danger px-4" href="register.php"><i class="fas fa-user-plus"></i> Register</a>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer text-center">
                            <small>&copy; 2025 Perpustakaan Online</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
