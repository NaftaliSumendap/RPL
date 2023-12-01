<?php
require '../functions/function_user.php';

if (isset($_POST["tambahBuku"])) {
    if (tambahBuku($_POST) > 0) {
        echo "<script>
    alert('Buku berhasil ditambahkan!');
          </script>";
    } else {
        echo mysqli_error($conn);
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="aktifitas.css">
    <title>Library Management System</title>
</head>

<body>
    <header>
        <h1>Perpustakaan Digital</h1>
        <nav>
            <ul>
                <li><a href="hpuser.html">Beranda</a></li>
                <li><a href="profil_anggota.html">Profil</a></li>
                <li><a href="aktifitas.html">Aktifitas</a></li>
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
        <form action="" method="post">
            <label for="bookTitle">Judul Buku:</label>
            <input type="text" id="bookTitle" name="bookTitle" required>

            <label for="bookAuthor">Penulis:</label>
            <input type="text" id="bookAuthor" name="bookAuthor" required>

            <label for="bookGenre">Genre:</label>
            <input type="text" id="bookGenre" name="bookGenre" required>

            <label for="bookDescription">Deskripsi:</label>
            <textarea id="bookDescription" name="bookDescription" required></textarea>

            <label for="bookImage">Gambar:</label>
            <input type="file" id="bookImage" name="bookImage" required>

            <button type="submit" name="tambahBuku" class="tambahBuku">Tambah Buku</button>
        </form>
    </section>


    <div class="footer">
        <p>&copy; 2023 Library Management System</p>
    </div>
</body>

</html>