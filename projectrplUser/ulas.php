<?php
session_start();

if (!isset($_SESSION["Login"])) {
    header("Location: login.php");
    exit;
}

require '../functions/functions.php';

$tampil = mysqli_query($conn, "SELECT * FROM data_user WHERE id='$_SESSION[id]'");

$usr = mysqli_fetch_array($tampil);

$idBuku = $_GET["id"];

function tambahUlasan($data)
{
    global $conn;
    global $usr;
    global $idBuku;

    $idUser = $usr["id"];
    $ulasan = $data["Ulasan"];
    $rating = $data["Rating"];


    mysqli_query($conn, "INSERT INTO review VALUES(null, $idUser, $idBuku, '$ulasan', '$rating')");

    return mysqli_affected_rows($conn);
}


if (isset($_POST["tambahUlasan"])) {
    if (tambahUlasan($_POST) > 0) {
        echo "<script>
    alert('Rating berhasil ditambahkan!');
    document.location.href = 'hpuser.php';
          </script>";
    } else {
        echo "<script>
    alert('Rating gagal ditambahkan!');
    document.location.href = 'hpuser.php';
          </script>";;
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../projectrpl/aktifitas.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Library Management System</title>
</head>

<body>
    <header>
        <h1>Perpustakaan Digital</h1>
        <nav>
            <ul>
                <li><a href="hpuser.php">Beranda</a></li>
                <li><a href="profil_anggota.php">Profil</a></li>
                <li><a href="aktifitas.php">Aktifitas</a></li>
            </ul>
        </nav>
    </header>

    <nav>
        <ul>
            <li><a href="#members">Manajemen Anggota</a></li>
            <li><a href="#statistics">Statistik Penggunaan</a></li>
            <li><a href="#addBook">Tambah Buku Baru</a></li>
        </ul>
    </nav>

    <div class="container">
        <section id="addBook">
            <h2>Tambah Ulasan</h2>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="bookDescription" class="form-label">Ulasan:</label>
                    <textarea id="bookDescription" name="Ulasan" class="form-control" required></textarea>
                </div>

                <div class="mb-3">
                    <label for="bookGenre" class="form-label">Rating:</label>
                    <select name="Rating" class="form-control">
                        <option value="0">
                            Pilih Rating
                        </option>
                        <option value="1">
                            1
                        </option>
                        <option value="2">
                            2
                        </option>
                        <option value="3">
                            3
                        </option>
                        <option value="4">
                            4
                        </option>
                        <option value="5">
                            5
                        </option>
                    </select>
                </div>

                <button type="submit" name="tambahUlasan" class="btn btn-primary" onclick="return confirm('Tambah Ulasan?')">Tambah Ulasan</button>
            </form>
        </section>

    </div>
</body>

</html>