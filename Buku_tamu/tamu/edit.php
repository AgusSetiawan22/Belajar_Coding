<?php
include '../includes/auth_check.php';
include '../includes/koneksi.php';

$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM buku_tamu WHERE id = '$id'"));

if (isset($_POST['update'])) {
    $nama = htmlspecialchars($_POST['nama']);
    $instansi = htmlspecialchars($_POST['instansi']);
    $keperluan = htmlspecialchars($_POST['keperluan']);

    mysqli_query($conn, "UPDATE buku_tamu SET 
        nama='$nama', 
        instansi='$instansi', 
        keperluan='$keperluan' 
        WHERE id = '$id'");

    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Edit Tamu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h3>Edit Tamu</h3>
    <form method="post">
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" value="<?= $data['nama'] ?>" required>
        </div>
        <div class="mb-3">
            <label>Instansi</label>
            <input type="text" name="instansi" class="form-control" value="<?= $data['instansi'] ?>" required>
        </div>
        <div class="mb-3">
            <label>Keperluan</label>
            <textarea name="keperluan" class="form-control" required><?= $data['keperluan'] ?></textarea>
        </div>
        <button type="submit" name="update" class="btn btn-warning">Update</button>
        <a href="index.php" class="btn btn-secondary">Batal</a>
    </form>
</div>
</body>
</html>
