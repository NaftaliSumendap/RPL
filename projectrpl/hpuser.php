<?php
require '../functions/function_user.php';

$user = query("SELECT * FROM buku");

$populer = query("SELECT * FROM buku ORDER BY tot_pinjam DESC LIMIT 10");

if (isset($_POST["cari"])) {
  $user = cari($_POST["keyword"]);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="hpuser_admin.css" />
  <title>Perpustakaan Digital</title>
</head>

<body>
  <header>
    <h1>Perpustakaan Digital</h1>
    <nav>
      <ul>
        <li><a href="hpuser.php">Beranda</a></li>
        <li><a href="aktifitas.php">Aktifitas</a></li>
      </ul>
    </nav>
  </header>

  <div class="log-out">
    <a href="logout.php">Log Out</a>
  </div>

  <nav>
    <ul>
      <li><a href="#search">Pencarian</a></li>
      <li><a href="#popular">Buku Populer</a></li>
      <li><a href="#categories">Kategori</a></li>
    </ul>
  </nav>

  <section id="search">
    <h2>Pencarian Buku</h2>
    <form action="" method="POST">
      <input type="text" placeholder="Judul, Penulis, atau Genre" name="keyword" autocomplete="off" autofocus />
      <button type="submit" name="cari">Cari</button>
    </form>
  </section>

  <section id="popular">
    <h2>Buku Terpopuler</h2>
    <!-- Daftar buku terpopuler dapat ditampilkan di sini -->
    <?php $i = 1; ?>
    <?php foreach ($populer as $row) : ?>
      <div class="book">
        <img src="../projectrpl/images/<?php echo $row["gambar"]; ?>" alt="Book Cover">
        <a href="dbcomputer_book1.html">
          <h3><?php echo $row["namaBuku"]; ?></h3>
        </a>
        <p>Penulis: <?php echo $row["penulis"]; ?></p>
        <?php $i++ ?>
      <?php endforeach; ?>
      </div>
  </section>

  <?php $i = 1; ?>
  <section id="bookList">
    <h2>Semua Buku</h2>
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

  <section id="categories">
    <h2>Kategori Buku</h2>
    <!-- Navigasi atau kategori buku dapat ditampilkan di sini -->
    <ul>
      <li><a href="category1.php">Ilmu Komputer dan Teknologi</a></li>
      <li><a href="category2.php">Kesehatan dan Kebugaran</a></li>
      <li><a href="category3.php">Hobi dan Keterampilan</a></li>
      <!-- Tambahkan lebih banyak kategori sesuai kebutuhan -->
    </ul>
  </section>
</body>

</html>