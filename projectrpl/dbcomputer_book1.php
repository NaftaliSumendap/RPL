<?php
require '../functions/functions_admin.php';

$user = query("SELECT * FROM buku WHERE genre='Hobi dan Keterampilan'");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="detailbuku.css">
    <title>Detail Buku - [Judul Buku]</title>
</head>

<body>
    <header>
        <h1>Detail Buku</h1>
        <nav>
            <ul>
                <li><a href="hpuser.php">Beranda</a></li>
            </ul>
        </nav>
    </header>

    <section id="bookDetails">
        <div class="bookCover">
            <img src="computer_book1.jpg" alt="Book Cover">
        </div>
        <div class="bookInfo">
            <?php foreach ($user as $row) : ?>
                <h2><?php echo $row["namaBuku"]; ?></h2>
                <p>Penulis: <?php echo $row["penulis"]; ?></p>
                <p>Sinopsis: Lorem ipsum dolor sit amet, consectetur adipiscing elit. ...</p>
                <!-- Informasi lainnya tentang buku -->
                <button class="borrowButton">Pinjam</button>
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