<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: main.php");
    exit;
}

require '../functions/functions_admin.php';

$user = query("SELECT * FROM buku WHERE genre='Kesehatan dan Kebugaran'");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="category1.css">
    <link rel="stylesheet" href="category1(2).css">
    <title>Kesehatan dan Kebugaran</title>
</head>

<body>
    <header>
        <h1>Kesehatan dan Kebugaran</h1>
        <nav>
            <ul>
                <li><a href="hpuser.php">Beranda</a></li>
            </ul>
        </nav>
    </header>

    <?php $i = 1; ?>
    <section id="bookList">
        <!-- Daftar buku kategori Kesehatan dan Kebugaran ditampilkan di sini -->
        <?php $i = 1; ?>
        <?php foreach ($user as $row) : ?>
            <div class="book">
                <img src="../images/<?php echo $row["gambar"]; ?>" alt="Book Cover">
                <a href="db_book.php?id=<?= $row["idBuku"]; ?>">
                    <h3><?php echo $row["namaBuku"]; ?></h3>
                </a>
                <p>Penulis: <?php echo $row["penulis"]; ?></p>
            </div>
            <?php $i++ ?>
        <?php endforeach; ?>
        <!-- Tambahkan lebih banyak buku sesuai kebutuhan -->
    </section>
    <?php $i++; ?>

    <footer>
        <p>&copy; 2023 Kesehatan dan Kebugaran. All rights reserved.</p>
    </footer>
</body>

</html>