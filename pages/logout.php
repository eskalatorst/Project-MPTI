<?php
session_start();
session_unset(); // Menghapus semua data sesi
session_destroy(); // Menghancurkan sesi
header('Location: login.php'); // Ganti dengan path ke halaman login Anda
exit();
?>
