<?php
session_start();
require '../includes/koneksi.php';

// Cek apakah user adalah admin
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../login.php");
    exit;
}

// Ambil data user berdasarkan ID dari parameter GET
$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM users WHERE id = $id");
$user = mysqli_fetch_assoc($query);

// Proses update saat form disubmit
if (isset($_POST['update'])) {
    $username = htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['email']);
    $role = $_POST['role'];
    $new_password = $_POST['password'];

    if (!empty($new_password)) {
        $password_hashed = password_hash($new_password, PASSWORD_DEFAULT);
        $update = mysqli_query($conn, "UPDATE users SET 
            username='$username', 
            email='$email', 
            role='$role', 
            password='$password_hashed' 
            WHERE id=$id");
    } else {
        $update = mysqli_query($conn, "UPDATE users SET 
            username='$username', 
            email='$email', 
            role='$role' 
            WHERE id=$id");
    }

    if ($update) {
        header("Location: admin.php");
    } else {
        $message = "<div class='alert alert-danger'>Gagal mengupdate data user.</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <div class="col-md-6 mx-auto">
        <div class="card shadow-sm">
            <div class="card-header bg-warning text-white">
                <h5>Edit Data User</h5>
            </div>
            <div class="card-body">
                <?php if (isset($message)) echo $message; ?>
                <form method="post">
                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" name="username" value="<?= $user['username'] ?>" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" value="<?= $user['email'] ?>" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Role</label>
                        <select name="role" class="form-select" required>
                            <option value="user" <?= $user['role'] === 'user' ? 'selected' : '' ?>>User</option>
                            <option value="admin" <?= $user['role'] === 'admin' ? 'selected' : '' ?>>Admin</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password Baru (Opsional)</label>
                        <input type="password" name="password" class="form-control" placeholder="Biarkan kosong jika tidak ingin mengubah">
                    </div>
                    <button type="submit" name="update" class="btn btn-primary">Simpan</button>
                    <a href="admin.php" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>
