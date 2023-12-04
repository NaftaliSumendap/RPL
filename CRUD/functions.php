<?php

$conn = mysqli_connect("localhost", "root", "admin", "rpl_user");

function hapus($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM buku WHERE idBuku=$id");
    return mysqli_affected_rows($conn);
}

function ubah($data)
{
    global $conn;
    $id = $data["id"];
    $nama = htmlspecialchars($data["bookTitle"]);
    $penulis = htmlspecialchars($data["bookAuthor"]);
    $genre = htmlspecialchars($data["bookCategory"]);
    $desc = htmlspecialchars($data["bookDescription"]);
    $image = htmlspecialchars($data["bookImage"]);
    $file = htmlspecialchars($data["bookFile"]);

    $image = uploadBuku();
    if (!$image) {
        return false;
    }

    $query = "UPDATE buku SET namaBuku = '$nama', penulis = '$penulis', genre = '$genre', 
    sinopsis = '$desc', gambar = '$image' WHERE idBuku = $id";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function uploadBuku()
{
    $namaFile = $_FILES['bookImage']['name'];
    $ukuranFile = $_FILES['bookImage']['size'];
    $error = $_FILES['bookImage']['error'];
    $tmpName = $_FILES['bookImage']['tmp_name'];

    if ($error === 4) {
        echo "<script>
        alert('pilih gambar terlebih dahulu!'); 
        </script>";
        return false;
    }

    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
        alert('Upload format yang benar!'); 
        </script>";
        return false;
    }

    if ($ukuranFile > 5000000) {
        echo "<script>
        alert('Ukuran gambar terlalu besar!'); 
        </script>";
    }

    move_uploaded_file($tmpName, '../images/'.$namaFile);

    return $namaFile;
}

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function cari($key)
{
    $key = "%{$key}%";

    $query = "SELECT * FROM buku 
    WHERE namaBuku LIKE '$key'
    OR genre LIKE '$key'
    OR penulis LIKE '$key'";

    return query($query);
}
