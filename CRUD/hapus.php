<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: ../projectrpl/login.php");
    exit;
}

require '../CRUD/functions.php';
$id = $_GET["id"];

if (hapus($id) > 0) {
    echo "<script>
    alert('data berhasil dihapus');
    document.location.href = '../projectrpl/aktifitas.php';
    </script>";
} else {
    echo "<script>
    alert('data gagal dihapus');
    document.location.href = '../projectrpl/aktifitas.php';
    </script>";
}
