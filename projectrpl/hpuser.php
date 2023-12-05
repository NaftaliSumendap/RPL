<?php
session_start();

if (!isset($_SESSION["login"])) {
  header("Location: main.php");
  exit;
}

require '../CRUD/functions.php';

$key = query("SELECT * FROM buku ORDER BY namaBuku ASC");

$populer = query("SELECT * FROM buku ORDER BY tot_pinjam DESC LIMIT 10");

$categories = query("SELECT * FROM category");

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="hpuser_admin.css" />
  <link rel="stylesheet" href="../CRUD/styles.css">
  <title>Perpustakaan Digital</title>
</head>

<body>
  <header>
    <h1>Perpustakaan Digital</h1>
    <nav>
      <ul>
        <li><a href="hpuser.php">Beranda</a></li>
        <li><a href="aktifitas.php">Aktifitas</a></li>
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
    <form action="../CRUD/searching.php" method="GET">
      <div class="input-group my-5">
        <input class="form-control" type="text" placeholder="Cari buku, penulis, kategori..." name="key" autocomplete="off" autofocus />
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
                    <i><b>Penulis: <?= $book['penulis'] ?>
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
                  <a href="../files/<?= $book['file'] ?>" class="btn btn-success">Open</a>

                  <a href="../images/<?= $book['gambar'] ?>" class="btn btn-primary" download="<?= $book['namaBuku'] ?>">Download</a>
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
                <i><b>Penulis: <?= $book['penulis'] ?>
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
              <a href="../files/<?= $book['file'] ?>" class="btn btn-success">Open</a>

              <a href="../files/<?= $book['file'] ?>" class="btn btn-primary" download="<?= $book['namaBuku'] ?>">Download</a>
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