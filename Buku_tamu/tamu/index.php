<?php
include '../includes/auth_check.php';
include '../includes/koneksi.php';

$user_id = $_SESSION['id'];
$is_admin = $_SESSION['role'] === 'admin';

$query = $is_admin
    ? "SELECT * FROM buku_tamu ORDER BY tanggal DESC"
    : "SELECT * FROM buku_tamu WHERE user_id = $user_id ORDER BY tanggal DESC";

$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Data Buku Tamu</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container mt-5">
    <h2 class="mb-4">Data Buku Tamu</h2>

    <a href="tambah.php" class="btn btn-success mb-3">+ Tambah Data</a>
    <a href="../dashboard/<?= $_SESSION['role'] ?>.php" class="btn btn-secondary mb-3 float-end">Kembali</a>

    <table class="table table-bordered table-striped">
      <thead class="table-dark">
        <tr>
          <th>No</th>
          <th>Nama</th>
          <th>Instansi</th>
          <th>Keperluan</th>
          <th>Tanggal</th>
          <th>Foto</th>
          <th>User ID</th>
          <th>Tindakan</th>
        </tr>
      </thead>
      <tbody>
        <?php $i = 1; while ($row = mysqli_fetch_assoc($result)) : ?>
        <tr>
          <td><?= $i++; ?></td>
          <td><?= $row['nama']; ?></td>
          <td><?= $row['instansi']; ?></td>
          <td><?= $row['keperluan']; ?></td>
          <td><?= $row['tanggal']; ?></td>
          <td>
            <?php if (!empty($row['foto'])): ?>
              <img src="<?= htmlspecialchars($row['foto']); ?>" alt="Foto" style="max-width: 100px; max-height: 100px;">
            <?php else: ?>
              Tidak ada foto
            <?php endif; ?>
          </td>
          <td><?= htmlspecialchars($row['user_id']); ?></td>
          <td>
            <a href="edit.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-warning" title="Edit data">Edit</a>
            <a href="hapus.php?id=<?= $row['id']; ?>" onclick="return confirm('Yakin hapus?')" class="btn btn-sm btn-danger" title="Hapus data">Hapus</a>
          </td>
        </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </div>
</body>
</html>
