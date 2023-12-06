<?php
session_start();

if (!isset($_SESSION["LOGIN"])) {
    header("Location: login.php");
    exit;
}

require '../functions/functions_penulis.php';

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

$id = $_SESSION["id"];

$books = query("SELECT * FROM buku WHERE id_penulis='$_SESSION[id]'");

$user = query("SELECT * FROM data_user");

$categories = query("SELECT * FROM category");

$writers = query("SELECT * FROM data_penulis");

$writer = query("SELECT * FROM data_penulis WHERE id='$_SESSION[id]'");

$bulan = query("SELECT bulan FROM penjualan WHERE tahun=2023");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../projectrpl/aktifitas.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="index.css">
    <title>Library Management System</title>
</head>

<body>
    <header>
        <h1>Library Management System</h1>
        <nav>
            <ul>
                <li><a href="#uploadBook">Unggah Buku</a></li>
                <li><a href="#manageBooks">Kelola Buku</a></li>
                <li><a href="#salesTracking">Pelacakan Penjualan</a></li>
                <li><a href="hpuser.php">Kembali</a></li>
            </ul>
        </nav>
    </header>

    <section id="uploadBook">
        <h2>Tambah Buku Baru</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="bookTitle" class="form-label">Judul Buku:</label>
                <input type="text" id="bookTitle" name="bookTitle" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="bookAuthor" class="form-label">Penulis:</label>
                <select name="bookAuthor" class="form-control">
                    </option>
                    <?php foreach ($writer as $row) { ?>
                        <option value="<?php echo $row['id']; ?>">
                            <?php echo $row['nama']; ?>
                        </option>
                    <?php } ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="bookGenre" class="form-label">Category:</label>
                <select name="bookCategory" class="form-control">
                    <option value="0">
                        Select Category
                    </option>
                    <?php foreach ($categories as $category) { ?>
                        <option value="<?php echo $category['id_category']; ?>">
                            <?php echo $category['category']; ?>
                        </option>
                    <?php } ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="bookDescription" class="form-label">Sinopsis:</label>
                <textarea id="bookDescription" name="bookDescription" class="form-control" required></textarea>
            </div>

            <div class="mb-3">
                <label for="bookImage" class="form-label">Gambar:</label>
                <input type="file" id="bookImage" name="bookImage" class="form-control">
            </div>

            <div class="mb-3">
                <label for="bookFile" class="form-label">File:</label>
                <input type="file" id="bookFile" name="bookFile" class="form-control">
            </div>

            <button type="submit" name="tambahBuku" class="btn btn-primary">Tambah Buku</button>
        </form>
    </section>

    <section id="manageBooks">
        <h2>Semua Buku Anda</h2>
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
                <?php foreach ($books as $row) : ?>
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
                            <a class="btn btn-warning" href="update.php?id=<?= $row["idBuku"]; ?>" class="btn btn-warning">Edit</a>
                            <a class="btn btn-danger" href="hapus.php?id=<?= $row["idBuku"]; ?>" onclick="return confirm('Konfirmasi?');">Delete</a>
                        </td>
                    </tr>
                    <?php $i++ ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </section>



    <section id="salesTracking">
        <h2>Pelacakan Penjualan</h2>
        <!-- Tabel atau grafik pelacakan penjualan dapat ditambahkan di sini -->
        <table>
            <caption>Pelacakan Penjualan</caption>
            <thead>
                <tr>
                    <th>Bulan</th>
                    <th>Jumlah Penjualan</th>
                    <th>Pendapatan</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($bulan as $row) : ?>
                    <tr>
                        <td><?= $row["bulan"] ?></td>
                        <td><?php echo count_total_book($id) ?></td>
                        <td>$<?php echo count_total_book($id)*5 ?></td>
                    </tr>
                    <?php $i++ ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </section>


    <footer>
        <p>&copy; 2023 Library Management System</p>
    </footer>
</body>

</html>