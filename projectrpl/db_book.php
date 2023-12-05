<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
}
require '../functions/functions_admin.php';

$id = $_GET["id"];

$result = query("SELECT * FROM buku WHERE idBuku='$id'");

$tampil = mysqli_query($conn, "SELECT * FROM buku WHERE idBuku='$_GET[id]'");

$book = mysqli_fetch_array($tampil);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="detailbuku.css">
    <title>Detail Buku - <?= $book["namaBuku"]; ?></title>
</head>

<body>
    <header>
        <h1>Detail Buku <?= $book["namaBuku"]; ?></h1>
        <nav>
            <ul>
                <li><a href="hpuser.php">Beranda</a></li>
            </ul>
        </nav>
    </header>

    <section id="bookDetails">
        <?php foreach ($result as $row) : ?>
            <div class="bookCover">
                <img src="../images/<?php echo $row["gambar"]; ?>" alt="Book Cover">
            </div>
            <div class="bookInfo">
                <h2><?php echo $row["namaBuku"]; ?></h2>
                <p>Penulis: <?php echo $row["penulis"]; ?></p>
                <p>Sinopsis: <?php echo $row["sinopsis"]; ?></p>
                <!-- Informasi lainnya tentang buku -->
                <!-- Gantilah "Pinjam" dengan "Beli" jika lebih sesuai -->
            <?php endforeach; ?>
            </div>
    </section>

    <section id="reviews">
        <h2>Ulasan dan Peringkat</h2>
        <!-- Bagian ulasan dan peringkat dapat ditampilkan di sini -->
        <div class="review">
            <h3>Nama Pengulas</h3>
            <p>Rating: 5/5</p>
            <p>Ulasan: Lorem ipsum dolor sit amet, consectetur adipiscing elit. ...</p>
        </div>
        <!-- Tambahkan lebih banyak ulasan sesuai kebutuhan -->
    </section>

    <footer>
        <p>&copy; 2023 Perpustakaan Digital. All rights reserved.</p>
    </footer>
</body>

</html>