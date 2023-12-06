<?php
session_start();

if (!isset($_SESSION["Login"])) {
    header("Location: login.php");
    exit;
}

require '../functions/functions.php';

if (isset($_POST["updateBuku"])) {
    if (updateUser($_POST) > 0) {
        echo "<script>
    alert('Data berhasil diubah!');
          </script>";
    } else {
        echo "<script>
    alert('Data tidak berhasil diubah!');
          </script>";;
    }
}

$tampil = mysqli_query($conn, "SELECT * FROM data_user WHERE id='$_SESSION[id]'");

$usr = mysqli_fetch_array($tampil);

$ulasan = query("SELECT * FROM ulasan WHERE id_user='$_SESSION[id]'");

$books = query("SELECT * FROM buku");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" href="kelolaakun.css" />
    <title>Kelola Akun</title>
</head>

<body>
    <header>
        <h1>Kelola Akun</h1>
        <nav>
            <ul>
                <li><a href="hpuser.php">Beranda</a></li>
                <li><a href="hpuser.php">Kategori</a></li>
                <li><a href="hpuser.php">Pencarian</a></li>
            </ul>
        </nav>
    </header>

    <div class="container">
        <section id="bookList">
            <table class="table table-bordered shadow">
                <thead>
                    <th>Foto Profil</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Sisa Jatah Peminjaman</th>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <img styles="align-items: center;" width="100" src="../PP/<?= $usr["gambar"]; ?>" alt="Profile Picture">
                        </td>
                        <td><?= $usr["nama"]; ?></td>
                        <td><?= $usr["email"]; ?></td>
                        <td><?= $usr["total_buku"]; ?></td>
                    </tr>
                </tbody>
            </table>
        </section>

        <div class="container">
            <section id="bookList">
                <h2 class="text-center pb-5 display-4 fs-3">Buku Dipinam</h2>
                <table class="table table-bordered shadow">
                    <thead>
                        <th>Nama Buku</th>
                        <th>Aksi</th>
                    </thead>
                    <?php foreach ($ulasan as $row) { ?>
                        <tbody>
                            <tr>
                                <td>
                                    <?php foreach ($books as $book) { ?>
                                        <?php if ($row['id_buku'] == $book['idBuku']) { ?>
                                            <img styles="align-items: center;" width="100" src="../images/<?= $book["gambar"]; ?>" alt="Profile Picture">
                                            <p class="d-block">
                                                <?= $book["namaBuku"]; ?>
                                            </p>
                                            <?php break; ?>
                                        <?php } ?>
                                    <?php } ?>
                                </td>
                                <td>
                                    <a href="db_book.php?id=<?= $book["idBuku"]; ?>" class="btn btn-primary" n\>Lihat</a>

                                    <a href="../files/<?= $book['file'] ?>" class="btn btn-success">Baca</a>

                                    <a href="ulas.php?id=<?= $book["idBuku"]; ?>" class="btn btn-success">Ulas</a>
                            </tr>
                        </tbody>
                    <?php } ?>
                </table>
            </section>

            <h2 class="text-center pb-5 display-4 fs-3">Ganti Data</h2>
            <form action="" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $usr["id"]; ?>">
                <div class="mb-3">
                    <label for="email">Alamat Email:</label>
                    <input type="email" id="email" name="email" class="form-control" value="<?= $usr["email"]; ?>" readonly />
                </div>
                <div class="mb-3">
                    <label for="name">Nama:</label>
                    <input type="text" id="name" name="name" class="form-control" value="<?= $usr["nama"]; ?>" readonly />
                </div>
                <div class="mb-3">
                    <label for="gambar" class="form-label">Foto Profil Baru:</label>
                    <input type="file" id="gambar" name="gambar" class="form-control" />
                </div>
                <button type="submit" name="updateBuku" class="btn btn-primary">Edit Profile</button>
            </form>
        </div>

</body>

</html>