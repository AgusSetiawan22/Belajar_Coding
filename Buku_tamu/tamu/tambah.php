<?php
include '../includes/auth_check.php';
include '../includes/koneksi.php';

if (isset($_POST['simpan'])) {
    $nama = htmlspecialchars($_POST['nama']);
    $instansi = htmlspecialchars($_POST['instansi']);
    $keperluan = htmlspecialchars($_POST['keperluan']);
    $tanggal = date('Y-m-d');
    $user_id = $_SESSION['id'];

    $foto = null;
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = '../uploads/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }
        $fileTmpPath = $_FILES['foto']['tmp_name'];
        $fileName = basename($_FILES['foto']['name']);
        $destPath = $uploadDir . $fileName;

        if (move_uploaded_file($fileTmpPath, $destPath)) {
            $foto = $destPath;
        }
    }

    $fotoValue = $foto ? "'$foto'" : "NULL";

    $query = "INSERT INTO buku_tamu (nama, instansi, keperluan, tanggal, user_id, foto)
              VALUES ('$nama', '$instansi', '$keperluan', '$tanggal', '$user_id', $fotoValue)";

    mysqli_query($conn, $query);

    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Tambah Tamu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h3>Tambah Tamu</h3>
    <form method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Instansi</label>
            <input type="text" name="instansi" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Keperluan</label>
            <textarea name="keperluan" class="form-control" required></textarea>
        </div>
        <div class="mb-3">
            <label>Foto</label>
            <input type="file" name="foto" class="form-control" accept="image/*">
        </div>
        <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
        <a href="index.php" class="btn btn-secondary">Batal</a>
    </form>
</div>
</body>
</html>
