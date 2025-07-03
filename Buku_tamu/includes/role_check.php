<?php
    if ($_SESSION['role'] !== 'admin') {
        echo "Akses ditolak!";
        exit;
    }
?>