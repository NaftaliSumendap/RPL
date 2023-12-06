<?php
session_start();

if (!isset($_SESSION["LOGIN"])) {
    header("Location: login.php");
    exit;
}

require '../functions/functions_penulis.php';

$id = $_GET["id"];

$usr = query("SELECT * FROM buku WHERE idBuku='$id'")[0];

$categories = query("SELECT * FROM category");

$writer = query("SELECT * FROM data_penulis WHERE id='$_SESSION[id]'");

if (isset($_POST["tambahBuku"])) {
    if (ubah($_POST) > 0) {
        echo "<script>
             alert('Data berhasil diubah');
             document.location.href = 'aktifitas.php';
             </script>";
    } else {
        echo "<script>
        alert('Data gagal diubah');
        document.location.href = 'aktifitas.php';
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
        <form action="" method="post" class="shadow p-4 rounded mt-5" style="width: 90%; max-width: 50rem;" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $usr["idBuku"]; ?>">
            <div class=" mb-3">
                <label for="bookTitle" class="form-label">Judul Buku:</label>
                <input type="text" id="bookTitle" name="bookTitle" class="form-control" value="<?= $usr["namaBuku"]; ?>" required>
            </div>

            <div class="mb-3">
                <label for="bookAuthor" class="form-label">Penulis:
                    <select name="bookAuthor" class="form-control">
                        </option>
                        <?php foreach ($writer as $row) { ?>
                            <option value="<?php echo $row['id']; ?>">
                                <?php echo $row['nama']; ?>
                            </option>
                        <?php } ?>
                    </select>
                </label>
            </div>

            <div class="mb-3">
                <label for="bookGenre" class="form-label">Category:</label>
                <select name="bookCategory" class="form-control">
                    <option value="<?= $usr["id_category"]; ?>">
                        <?php foreach ($categories as $category) { ?>
                            <?php if ($category['id_category'] == $usr['id_category']) { ?>
                                <?php echo $category['category']; ?>
                                <?php break; ?>
                            <?php } ?>
                        <?php } ?>
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
                <textarea id="bookDescription" name="bookDescription" class="form-control"><?= $usr["sinopsis"]; ?></textarea>
            </div>

            <div class=" mb-3">
                <label for="bookImage" class="form-label">Gambar:</label>
                <input type="file" id="bookImage" name="bookImage" class="form-control" value="<?= $usr["gambar"] ?>">
                <a href="../images/<?= $usr['gambar'] ?>" class="link-dark">Current Image</a>
            </div>

            <div class="mb-3">
                <label for="bookFile" class="form-label">File:</label>
                <input type="file" id="bookFile" name="bookFile" class="form-control" value="<?= $usr["file"] ?>">
            </div>

            <button type="submit" name="tambahBuku" class="btn btn-primary">Edit Buku</button>
        </form>
    </div>
    <!-- Feather Icons-->
</body>

</html>