<?php
    include '../includes/auth_check.php';
    include '../includes/koneksi.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">Aplikasi Buku Tamu</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../dashboard/user.php">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../tamu/index.php">Isi Buku Tamu</a>
                    </li>
                </ul>
                <ul class="navbar-nav d-flex align-items-center">
                    <li class="nav-item me-3">
                        <span class="navbar-text text-white fw-semibold">Selamat Datang, <?= htmlspecialchars($_SESSION['username']); ?></span>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-danger btn-sm" href="../auth/logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="container mt-5">
        <div class="p-4 bg-white rounded shadow-sm">
            <h2 class="mb-3">Dashboard User</h2>
            <p>Ini adalah halaman dashboard untuk pengguna dengan menu yang lebih lengkap dan tampilan yang lebih rapi.</p>
            <a href="../tamu/tambah.php" class="btn btn-success mt-3">+ Tambah Data Buku Tamu</a>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
