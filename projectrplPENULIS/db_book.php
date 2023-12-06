<?php
session_start();

if (!isset($_SESSION["LOGIN"])) {
    header("Location: login.php");
    exit;
}

require '../functions/functions.php';

$id = $_GET["id"];

$result = query("SELECT * FROM buku WHERE idBuku='$id'");

$tampil = mysqli_query($conn, "SELECT * FROM buku WHERE idBuku='$_GET[id]'");

$book = mysqli_fetch_array($tampil);

$review = query("SELECT * FROM review WHERE id_buku=$id");

$writers = query("SELECT * FROM data_penulis");

$users = query("SELECT * FROM data_user");
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
                <p>Penulis:
                    <?php foreach ($writers as $writer) { ?>
                        <?php if ($writer['id'] == $row['id_penulis']) { ?>
                            <?php echo $writer['nama']; ?>
                            <?php break; ?>
                        <?php } ?>
                    <?php } ?>
                </p>
                <p>Sinopsis: <?php echo $row["sinopsis"]; ?></p>
                <!-- Informasi lainnya tentang buku -->
                <!-- Gantilah "Pinjam" dengan "Beli" jika lebih sesuai -->
            </div>
        <?php endforeach; ?>
    </section>

    <section id="reviews">
        <h2>Ulasan dan Peringkat</h2>
        <?php foreach ($review as $row) : ?>
            <div class="review">
                <h3>
                    <?php foreach ($users as $user) { ?>
                        <?php if ($user['id'] == $row['id_user']) { ?>
                            <?php echo $user['nama']; ?>
                            <?php break; ?>
                        <?php } ?>
                    <?php } ?>
                </h3>
                <p>Rating: <?php echo $row["rating"] ?></p>
                <p>Ulasan: <?php echo $row["ulasan"] ?></p>
            </div>
        <?php endforeach; ?>
    </section>

</body>

</html>