<?php
session_start();
include '../includes/koneksi.php';

// Cek apakah sudah login dan role-nya admin
if (!isset($_SESSION['username']) || $_SESSION['role'] != 'admin') {
    header('Location: ../login.php');
    exit;
}

// Ambil data user dari database
$userQuery = mysqli_query($conn, "SELECT * FROM users ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h2 class="mb-4">Dashboard Admin</h2>

        <div class="mb-4">
            <a href="../tamu/index.php" class="btn btn-primary">Kelola Buku Tamu</a>
            <a href="../auth/logout.php" class="btn btn-secondary">Logout</a>
        </div>

        <div class="card">
            <div class="card-header bg-dark text-white">
                <h5>Kelola Data User</h5>
            </div>
            <div class="card-body">
                <a href="../auth/register.php" class="btn btn-success mb-3">Tambah User</a>

                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        while ($user = mysqli_fetch_assoc($userQuery)):
                        ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= htmlspecialchars($user['username']); ?></td>
                            <td><?= htmlspecialchars($user['email']); ?></td>
                            <td><?= htmlspecialchars($user['role']); ?></td>
                            <td>
                                <a href="edit_user.php?id=<?= $user['id']; ?>" class="btn btn-sm btn-warning">Edit</a>
                                <a href="hapus_user.php?id=<?= $user['id']; ?>" onclick="return confirm('Yakin hapus user?')" class="btn btn-sm btn-danger">Hapus</a>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
