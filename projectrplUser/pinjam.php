<?php
session_start();
if (!isset($_SESSION["Login"])) {
    header("Location: login.php");
    exit;
}

require '../functions/functions.php';

$id = $_GET["id"];
$buku = $_GET["idBuku"];

function updateJatah()
{
    global $conn;
    global $id;
    global $buku;

    $tampil = mysqli_query($conn, "SELECT total_buku FROM data_user WHERE id=$id && total_buku > 0");
    $rowcount = mysqli_num_rows($tampil);

    if ($rowcount > 0) {
        // There are available books, update can be performed
        $query = "UPDATE data_user SET total_buku = total_buku-1, tot_pinjam = tot_pinjam+1 WHERE id=$id";
        mysqli_query($conn, $query);
        $query2 = "INSERT INTO ulasan VALUES (null, $id, $buku)";
        mysqli_query($conn, $query2);
        $query3 = "UPDATE buku SET tot_pinjam = tot_pinjam+1 WHERE idBuku=$buku";
        mysqli_query($conn, $query3);
        echo "<script>
        alert('Peminjaman Berhasil!');
        document.location.href = 'hpuser.php';
        </script>";
    } else {
        // No available books, update can't be performed
        echo "<script>
        alert('Peminjan Gagal, Jatah Peminjaman Anda Telah Habis!');
        document.location.href = 'hpuser.php';
        </script>";
    }
}

updateJatah();
