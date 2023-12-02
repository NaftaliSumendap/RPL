<?php
require '../CRUD/functions.php';

$id = $_GET["id"];

$usr = query("SELECT * FROM buku WHERE idBuku='$id'")[0];

if (isset($_POST["tambahBuku"])) {
    if (ubah($_POST) > 0) {
        echo "<script>
             alert('Data berhasil diubah');
             document.location.href = '../projectrpl/aktifitas.php';
             </script>";
    } else {
        echo "<script>
        alert('Data gagal diubah');
        document.location.href = '../projectrpl/aktifitas.php';
        </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!--Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Update Data</title>
    <link rel="stylesheet" href="../Daftar/style.css" />
    <script src="SCRIPT/script.js"></script>
</head>

<body>
    <div class="container">
        <h1 class="text-center pb-5 display-4 fs-3">Edit Buku</h1>
        <form action="" method="post" class="shadow p-4 rounded mt-5" style="width: 90%; max-width: 50rem;">
            <input type="hidden" name="id" value="<?= $usr["idBuku"]; ?>">
            <div class=" mb-3">
                <label for="bookTitle" class="form-label">Judul Buku:</label>
                <input type="text" id="bookTitle" name="bookTitle" class="form-control" value="<?= $usr["namaBuku"]; ?>" required>
            </div>

            <div class="mb-3">
                <label for="bookAuthor" class="form-label">Penulis:</label>
                <input type="text" id="bookAuthor" name="bookAuthor" class="form-control" value="<?= $usr["penulis"]; ?>" required>
            </div>

            <div class="mb-3">
                <label for="bookGenre" class="form-label">Category:</label>
                <select name="bookCategory" class="form-control">
                    <option value="0">
                        <?= $usr["genre"]; ?>
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
                <textarea id="bookDescription" name="bookDescription" class="form-control"><?= $usr["sinopsis"]; ?></textarea>
            </div>

            <div class=" mb-3">
                <label for="bookImage" class="form-label">Gambar:</label>
                <input type="file" id="bookImage" name="bookImage" class="form-control">
                <a href="../images/<?= $usr['gambar'] ?>" class="link-dark">Current Image</a>
            </div>

            <div class="mb-3">
                <label for="bookFile" class="form-label">File:</label>
                <input type="file" id="bookFile" name="bookFile" class="form-control">
            </div>

            <button type="submit" name="tambahBuku" class="btn btn-primary">Edit Buku</button>
        </form>
    </div>
    <!-- Feather Icons-->
</body>

</html>