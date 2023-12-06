<?php
session_start();

if (!isset($_SESSION["LOGIN"])) {
    header("Location: login.php");
    exit;
}

require '../CRUD/functions.php';

$key = query("SELECT * FROM buku ORDER BY namaBuku ASC");

$populer = query("SELECT * FROM buku ORDER BY tot_pinjam DESC LIMIT 6");

$categories = query("SELECT * FROM category");

$writers = query("SELECT * FROM data_penulis");

$tampil = mysqli_query($conn, "SELECT * FROM data_user WHERE id='$_SESSION[id]'");

$usr = mysqli_fetch_array($tampil);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="hpuser.css" />
    <link rel="stylesheet" href="../CRUD/styles.css">
    <title>Perpustakaan Digital</title>
</head>

<body>
    <header>
        <h1>Perpustakaan Digital</h1>
        <nav>
            <ul>
                <li><a href="hpuser.php">Beranda</a></li>
                <li><a href="aktifitas.php">Profile</a></li>
                <li><a href="logout.php" onclick="return confirm('Keluar?')">Log Out</a></li>
            </ul>
        </nav>
    </header>

    <nav>
        <ul>
            <li><a href="#search">Pencarian</a></li>
            <li><a href="#popular">Buku Populer</a></li>
            <li><a href="#categories">Kategori</a></li>
        </ul>
    </nav>

    <section id="search">
        <h2>Pencarian Buku</h2>
        <form action="searching.php" method="GET">
            <div class="input-group my-5">
                <input class="form-control" type="text" placeholder="Cari buku..." name="key" autocomplete="off" autofocus />
                <button class="input-group-textbtn btn-primary" name="cari">Cari</button>
            </div>
        </form>
    </section>

    <div class="container">
        <h2>Buku Terpopuler</h2>
        <div class="d-flex pt-3">
            <?php if ($populer === null) { ?>
                <div class="alert alert-warning 
        	            text-center p-5 pdf-list" role="alert">
                    <img src="img/empty-search.png" width="100">
                    <br>
                    The key <b>"<?= $hasil ?>"</b> didn't match to any record
                    in the database
                </div>
            <?php } else ?>
            <?php { ?>
                <div class="d-flex">
                    <div class="pdf-list d-flex flex-wrap">
                        <?php $i = 1; ?>
                        <?php foreach ($populer as $book) { ?>
                            <div class="card m-1">
                                <img src="../images/<?= $book['gambar'] ?>" class="card-img-top">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <?= $book['namaBuku'] ?>
                                    </h5>
                                    <p class="card-text">
                                        <i><b>Penulis:
                                                <?php foreach ($writers as $writer) { ?>
                                                    <?php if ($writer['id'] == $book['id_penulis']) { ?>
                                                        <?php echo $writer['nama']; ?>
                                                        <?php break; ?>
                                                    <?php } ?>
                                                <?php } ?>
                                                <br></b></i>
                                        <?= $book['sinopsis'] ?>
                                        <br><i><b>Category:
                                                <br></b></i>
                                        <?php foreach ($categories as $category) { ?>
                                            <?php if ($category['id_category'] == $book['id_category']) { ?>
                                                <?php echo $category['category']; ?>
                                                <?php break; ?>
                                            <?php } ?>
                                        <?php } ?>
                                    </p>
                                    <a href="pinjam.php?id=<?= $usr["id"] ?>&idBuku=<?= $book['idBuku'] ?>" class="btn btn-success" onclick="return confirm('Yakin Meminjam? Peminjaman ini akan mengurangi jatah pinjam Anda!')">Pinjam</a>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
        </div>

    <?php } ?>
    </section>

    <h2>Daftar Semua Buku</h2>
    <div class="d-flex pt-3">
        <?php if ($key === null) { ?>
            <div class="alert alert-warning 
        	            text-center p-5 pdf-list" role="alert">
                <img src="img/empty-search.png" width="100">
                <br>
                The key <b>"<?= $hasil ?>"</b> didn't match to any record
                in the database
            </div>
        <?php } ?>
        <?php $i = 1; ?>
        <div class="d-flex">
            <div class="pdf-list d-flex flex-wrap">
                <?php $i = 1; ?>
                <?php foreach ($key as $book) : ?>
                    <div class="card m-1">
                        <img src="../images/<?= $book['gambar'] ?>" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">
                                <?= $book['namaBuku'] ?>
                            </h5>
                            <p class="card-text">
                                <i><b>Penulis:
                                        <?php foreach ($writers as $writer) { ?>
                                            <?php if ($writer['id'] == $book['id_penulis']) { ?>
                                                <?php echo $writer['nama']; ?>
                                                <?php break; ?>
                                            <?php } ?>
                                        <?php } ?>
                                        <br></b></i>
                                <?= $book['sinopsis'] ?>
                                <br><i><b>Category:
                                        <br></b></i>
                                <?php foreach ($categories as $category) { ?>
                                    <?php if ($category['id_category'] == $book['id_category']) { ?>
                                        <?php echo $category['category']; ?>
                                        <?php break; ?>
                                    <?php } ?>
                                <?php } ?>
                            </p>
                            <a href="db_book.php?id=<?= $book["idBuku"]; ?>" class="btn btn-primary" n\>Lihat</a>

                            <a href="pinjam.php?id=<?= $usr["id"] ?>&idBuku=<?= $book['idBuku'] ?>" class="btn btn-success" onclick="return confirm('Yakin Meminjam? Peminjaman ini akan mengurangi jatah pinjam Anda!')">Pinjam</a>
                        </div>
                    </div>
                <?php endforeach; ?>
                <?php $i++ ?>
            </div>
            <?php if ($i % 3 == 0) ?>
            <?php $i++ ?>
        </div>
    </div>


    <section id="categories">
        <h2>Kategori Buku</h2>
        <!-- Navigasi atau kategori buku dapat ditampilkan di sini -->
        <ul>
            <?php $i = 1; ?>
            <?php foreach ($categories as $category) : ?>
                <li><a href="category.php?id_category=<?= $category["id_category"]; ?>"><?= $category["category"]; ?></a></li>
            <?php endforeach; ?>
            <?php $i++ ?>
        </ul>
    </section>
    </div>
</body>

</html>