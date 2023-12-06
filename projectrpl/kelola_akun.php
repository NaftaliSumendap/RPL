<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
}

require '../functions/functions_admin.php';

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

$tampil = mysqli_query($conn, "SELECT * FROM regist WHERE id='$_SESSION[id]'");

$usr = mysqli_fetch_array($tampil);

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
        <li><a href="profil_anggota.php">Profil</a></li>
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
        </thead>
        <tbody>
          <tr>
            <td>
              <img styles="align-items: center;" width="100" src="../PP/<?= $usr["image"]; ?>" alt="Profile Picture">
            </td>
            <td><?= $usr["nama"]; ?></td>
            <td><?= $usr["email"]; ?></td>
          </tr>
        </tbody>
      </table>
    </section>

  
    <h2 class="text-center pb-5 display-4 fs-3">Ganti Data</h2>
    <div>
      <form action="" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $usr["id"]; ?>">
        <div class="mb-3">
          <label for="email">Alamat Email:</label>
          <input type="email" id="email" name="email" class="form-control" value="<?= $usr["email"]; ?>" />
        </div>
        <div class="mb-3">
          <label for="name">Nama:</label>
          <input type="text" id="name" name="name" class="form-control" value="<?= $usr["nama"]; ?>" />
        </div>
        <div class="mb-3">
          <label for="gambar" class="form-label">File:</label>
          <input type="file" id="gambar" name="gambar" class="form-control" />
        </div>
        <button type="submit" name="updateBuku" class="btn btn-primary">Ganti Data</button>
      </form>
    </div>
  </div>

</body>

</html>