<?php
include '../includes/auth_check.php';
include '../includes/koneksi.php';

$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM buku_tamu WHERE id = $id");
header("Location: index.php");
?>