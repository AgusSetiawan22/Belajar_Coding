<?php
session_start();
require '../includes/koneksi.php';

if (isset($_POST['register'])) {
    $username = htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['email']);
$password = $_POST['password'];
    
    // Cek apakah yang register adalah admin
    $is_admin = isset($_SESSION['role']) && $_SESSION['role'] === 'admin';
    
    // Role: admin bisa pilih, user biasa default "user"
    $role = $is_admin ? $_POST['role'] : 'user';
    
    $check = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
    if (mysqli_num_rows($check) > 0) {
        $message = "<div class='alert alert-warning'>Username sudah digunakan!</div>";
    } else {
        $query = "INSERT INTO users (username, email, password, role) 
                VALUES ('$username', '$email', '$password', '$role')";
        if (mysqli_query($conn, $query)) {
            if ($is_admin) {
                header("Location: ../dashboard/admin.php");
            } else {
                $message = "<div class='alert alert-success'>Registrasi berhasil. Silakan <a href='login.php' class='alert-link'>Login</a>.</div>";
            }
        } else {
            $message = "<div class='alert alert-danger'>Gagal registrasi: " . mysqli_error($conn) . "</div>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Registrasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow-lg">
                <div class="card-header bg-primary text-white text-center">
                    <h4>Register</h4>
                </div>
                <div class="card-body">
                    <!-- Pesan notifikasi -->
                    <?php if (isset($message)) echo $message; ?>
                    
                    <form method="post">
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" name="username" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
                        <div class="mb-3">
                            <label class="form-label">Role</label>
                            <select name="role" class="form-select" required>
                                <option value="user">User</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>
                        <?php endif; ?>
                        <button type="submit" name="register" class="btn btn-primary w-100">Register</button>
                    </form>
                </div>
                <div class="text-center mt-3">
                    <p>Sudah punya akun? <a href="login.php">Login di sini</a></p>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
