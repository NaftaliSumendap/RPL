<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: main.php");
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

    <section id="members">
        <h2>Manajemen Anggota</h2>
        <!-- Tambahkan formulir atau tabel untuk manajemen anggota di sini -->
        <form action="#" method="post">
            <label for="memberName">Nama Anggota:</label>
            <input type="text" id="memberName" name="memberName" required>

            <label for="memberEmail">Email Anggota:</label>
            <input type="email" id="memberEmail" name="memberEmail" required>

            <button type="submit" class="tambahAnggota">Tambah Anggota</button>
        </form>

        <table>
            <caption>Daftar Anggota</caption>
            <thead>
                <tr>
                    <th>ID Anggota</th>
                    <th>Nama Anggota</th>
                    <th>Email</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <!-- Tabel untuk menampilkan daftar anggota akan ditambahkan di sini -->
                <tr>
                    <td>ID001</td>
                    <td>Joachim Kalangi</td>
                    <td>joachimkalangi@unsrat.com</td>
                </tr>
            </tbody>
        </table>
    </section>

    <section id="statistics">
        <h2>Statistik Penggunaan</h2>
        <p>Total Buku Dipinjam: 30</p>
        <p>Rata-rata Rating: 4.2</p>

        <!-- Tabel Dummy Statistik -->
        <table>
            <caption>Statistik Penggunaan Buku</caption>
            <thead>
                <tr>
                    <th>Bulan</th>
                    <th>Jumlah Dipinjam</th>
                    <th>Rata-rata Rating</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Januari</td>
                    <td>10</td>
                    <td>4.5</td>
                </tr>
                <tr>
                    <td>Februari</td>
                    <td>8</td>
                    <td>3.8</td>
                </tr>
                <tr>
                    <td>Maret</td>
                    <td>12</td>
                    <td>4.0</td>
                </tr>
                <!-- Tambahkan baris statistik tambahan di sini -->
            </tbody>
        </table>
    </section>


    <section id="addBook">
        <h2>Tambah Buku Baru</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="bookTitle" class="form-label">Judul Buku:</label>
                <input type="text" id="bookTitle" name="bookTitle" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="bookAuthor" class="form-label">Penulis:</label>
                <input type="text" id="bookAuthor" name="bookAuthor" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="bookGenre" class="form-label">Category:</label>
                <select name="bookCategory" class="form-control">
                    <option value="0">
                        Select Category
                    </option>
                    <option value="Kesehatan dan Kebugaran">
                        Kesehatan dan Kebugaran
                    </option>
                    <option value="Hobi dan Keterampilan">
                        Hobi dan Keterampilan
                    </option>
                    <option value="Ilmu Komputer dan Teknologi">
                        Ilmu Komputer dan Teknologi
                    </option>
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
                            <a class="link-dark d-block text-center" href="../files/tes.html">
                                <?= $row["namaBuku"]; ?>
                            </a>
                        </td>
                        <td><?= $row["penulis"]; ?></td>
                        <td><?= $row["genre"]; ?></td>
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

    <div class="footer">
        <p>&copy; 2023 Library Management System</p>
    </div>
</body>

</html>