<?php
session_start();

if (!isset($_SESSION["LOGIN"])) {
    header("Location: login.php");
    exit;
}

require '../CRUD/functions.php';
$id = $_GET["id"];

if (hapus($id) > 0) {
    echo "<script>
    alert('data berhasil dihapus');
    document.location.href = 'aktifitas.php';
    </script>";
} else {
    echo "<script>
    alert('data gagal dihapus');
    document.location.href = 'aktifitas.php';
    </script>";
}
