<?php
require '../functions/functions_penulis.php';

$user = query("SELECT * FROM buku WHERE genre='Ilmu Komputer dan Teknologi'");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="category1.css">
    <link rel="stylesheet" href="category1(2).css">
    <title>Ilmu Komputer dan Teknologi</title>
</head>

<body>
    <header>
        <h1>Ilmu Komputer dan Teknologi</h1>
        <nav>
            <ul>
                <li><a href="hpuser.html">Beranda</a></li>
            </ul>
        </nav>
    </header>

    <?php $i = 1; ?>
    <section id="bookList">
        <!-- Daftar buku kategori Ilmu Komputer dan Teknologi ditampilkan di sini -->
        <?php $i = 1; ?>
        <?php foreach ($user as $row) : ?>
            <div class="book">
                <img src="../projectrpl/images/<?php echo $row["gambar"]; ?>" alt="Book Cover">
                <a href="dbcomputer_book1.html">
                    <h3><?php echo $row["namaBuku"]; ?></h3>
                </a>
                <p>Penulis: <?php echo $row["penulis"]; ?></p>
            </div>
            <?php $i++ ?>
        <?php endforeach; ?>
    </section>
    <?php $i++; ?>

    <footer>
        <p>&copy; 2023 Ilmu Komputer dan Teknologi. All rights reserved.</p>
    </footer>
</body>

</html>