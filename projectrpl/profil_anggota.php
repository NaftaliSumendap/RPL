<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require '../functions/functions.php';

$tampil = mysqli_query($conn, "SELECT * FROM regist WHERE id='$_SESSION[id]'");

$usr = mysqli_fetch_array($tampil);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylespp.css">
    <link rel="stylesheet" href="aktifitas.css">
    <title>Profil Anggota - <?= $usr["nama"] ?></title>
</head>

<body>
    <header>
        <h1>Profil Anggota</h1>
        <nav>
            <ul>
                <li><a href="hpuser.php">Beranda</a></li>
            </ul>
        </nav>
    </header>

    <section id="personalInfo">
        <h2>Informasi Pribadi</h2>
        <div class="profileDetails">
            <img src="../PP/<?= $usr["image"]; ?>" alt="Profile Picture">
            <div>
                <h3><?= $usr["nama"] ?></h3>
                <p>Email: <?= $usr["email"] ?></p>
                <!-- Informasi pribadi lainnya -->
            </div>
        </div>
    </section>

    <section id="accountSettings">
        <h2>Pengaturan Akun</h2>
        <a href="kelola_akun.php"><button class="manageAccountButton">Kelola Akun</button></a>
    </section>

</body>

</html>