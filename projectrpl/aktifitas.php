<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require '../functions/functions_admin.php';

if (isset($_POST["tambahBuku"])) {
    if (tambahBuku($_POST) > 0) {
        echo "<script>
    alert('Buku berhasil ditambahkan!');
          </script>";
    } else {
        echo "<script>
    alert('Buku gagal ditambahkan!');
          </script>";;
    }
}

$buku = query("SELECT * FROM buku");

$user = query("SELECT * FROM data_user");

$categories = query("SELECT * FROM category");

$writers = query("SELECT * FROM data_penulis");

$bulan = query("SELECT bulan FROM penjualan WHERE tahun=2023");

if (isset($_POST["addCate"])) {
    if (addCate($_POST) > 0) {
        echo "<script>
    alert('Category berhasil ditambahkan!');
          </script>";
    } else {
        echo "<script>
    alert('Category gagal ditambahkan!');
          </script>";;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../projectrpl/aktifitas.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Library Management System</title>
</head>

<body>
    <header>
        <h1>Perpustakaan Digital</h1>
        <nav>
            <ul>
                <li><a href="hpuser.php">Beranda</a></li>
                <li><a href="profil_anggota.php">Profil</a></li>
                <li><a href="aktifitas.php">Aktifitas</a></li>
            </ul>
        </nav>
    </header>

    <nav>
        <ul>
            <li><a href="#members">Manajemen Anggota</a></li>
            <li><a href="#statistics">Statistik Penggunaan</a></li>
            <li><a href="#addBook">Tambah Buku Baru</a></li>
        </ul>
    </nav>

    <div class="container">
        <section id="members">
            <h2>Manajemen Anggota</h2>
            <table class="table table-bordered shadow">
                <thead>
                    <th>ID Anggota</th>
                    <th>Nama Anggota</th>
                    <th>Email</th>
                    <th>Total Buku Dipinjam</th>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($user as $row) : ?>
                        <tr>
                            <td><?= $row["id"]; ?></td>
                            <td><?= $row["nama"]; ?></td>
                            <td><?= $row["email"]; ?></td>
                            <td><?= $row["tot_pinjam"] ?></td>
                            <?php $i++ ?>
                        <?php endforeach; ?>
                </tbody>
            </table>
        </section>

        <section id="statistics">
            <h2>Statistik Penggunaan</h2>
            <p>Total Buku Dipinjam: <?php echo count_total_book() ?></p>
            <p>Rata-rata Rating: <?php echo avgRating() ?>/5 </p>

            <!-- Tabel Dummy Statistik -->
            <table class="table table-bordered shadow">
                <caption>Statistik Penggunaan</caption>
                <thead>
                    <th>Bulan</th>
                    <th>Jumlah Dipinjam</th>
                    <th>Rata-rata Rating</th>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($bulan as $row) : ?>
                        <tr>
                            <td><?= $row["bulan"] ?></td>
                            <td><?php echo count_total_book() ?></td>
                            <td><?php echo avgRating() ?></td>
                        </tr>
                            <?php $i++ ?>
                        <?php endforeach; ?>
                </tbody>
            </table>
        </section>

        <section id="bookList">
            <h2>Semua Buku</h2>
            <table class="table table-bordered shadow">
                <thead>
                    <th>#</th>
                    <th>Judul Buku</th>
                    <th>Penulis</th>
                    <th>Genre</th>
                    <th>Sinopsis</th>
                    <th>Aksi</th>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($buku as $row) : ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td>
                                <img styles="align-items: center;" width="100" src="../images/<?= $row["gambar"]; ?>" alt="Book Cover">
                                <a class="link-dark d-block text-center" href="db_book.php?id=<?= $row["idBuku"]; ?>">
                                    <?= $row["namaBuku"]; ?>
                                </a>
                            </td>
                            <td>
                                <?php foreach ($writers as $writer) { ?>
                                    <?php if ($writer['id'] == $row['id_penulis']) { ?>
                                        <?php echo $writer['nama']; ?>
                                        <?php break; ?>
                                    <?php } ?>
                                <?php } ?>
                            </td>
                            <td>
                                <?php foreach ($categories as $category) { ?>
                                    <?php if ($category['id_category'] == $row['id_category']) { ?>
                                        <?php echo $category['category']; ?>
                                        <?php break; ?>
                                    <?php } ?>
                                <?php } ?>
                            </td>
                            <td>
                                <?= $row["sinopsis"]; ?>
                            </td>
                            <td>
                                <a class="btn btn-warning" href="../CRUD/update.php?id=<?= $row["idBuku"]; ?>" class="btn btn-warning">Edit</a>
                                <a class="btn btn-danger" href="../CRUD/hapus.php?id=<?= $row["idBuku"]; ?>" onclick="return confirm('Konfirmasi?');">Delete</a>
                            </td>
                        </tr>
                        <?php $i++ ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>


        <form action="" method="post" class="shadow p-4 rounded mt-5" style="width: 90%; max-width: 50rem;">
            <h1 class="text-center pb-5 display-4 fs-3">
                Add New Category
            </h1>
            <div class="mb-3">
                <label class="form-label">
                    Category Name
                </label>
                <input type="text" class="form-control" name="category_name">
            </div>

            <button type="submit" class="btn btn-primary" name="addCate">Add Category</button>
        </form>
    </div>

    <div class="footer">
        <p>&copy; 2023 Library Management System. All rights reserved.</p>
    </div>
    </div>
</body>

</html>