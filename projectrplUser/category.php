<?php
session_start();

if (!isset($_SESSION["Login"])) {
    header("Location: login.php");
    exit;
}

require '../functions/functions_admin.php';

$idCate = $_GET["id_category"];

$user = query("SELECT * FROM buku WHERE id_category=$idCate");

$tampil = mysqli_query($conn, "SELECT * FROM category WHERE id_category='$_GET[id_category]'");

$usr = mysqli_fetch_array($tampil);

$writers = query("SELECT * FROM data_penulis");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="category.css">
    <title>Ilmu Komputer dan Teknologi</title>
</head>

<body>
    <header>
        <h1><?= $usr["category"] ?></h1>
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
                <p><i><b>Penulis:
                            <?php foreach ($writers as $writer) { ?>
                                <?php if ($writer['id'] == $row['id_penulis']) { ?>
                                    <?php echo $writer['nama']; ?>
                                    <?php break; ?>
                                <?php } ?>
                            <?php } ?>
                    </i></b></p>
            </div>
            <?php $i++ ?>
        <?php endforeach; ?>
        <!-- Tambahkan lebih banyak buku sesuai kebutuhan -->
    </section>
    <?php $i++; ?>

    <footer>
        <p>&copy; 2023 <?= $usr["category"] ?>. All rights reserved.</p>
    </footer>
</body>

</html>