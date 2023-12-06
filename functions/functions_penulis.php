<?php

$conn = mysqli_connect("localhost", "root", "admin", "rpl_user");

function registrasi($data)
{
    global $conn;

    $nama = stripslashes($data["name"]);
    $email = $data["email"];
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $repassword = mysqli_real_escape_string($conn, $data["re-password"]);

    $result = mysqli_query($conn, "SELECT email FROM data_penulis WHERE email = '$email'");

    if (mysqli_fetch_assoc($result)) {
        echo "<script>
        alert('Email telah digunakan!');
              </script>";
        return false;
    }

    if ($password !== $repassword) {
        echo "<script>
        alert('Password yang dimasukkan tidak sesuai!');
              </script>";
        return false;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);

    mysqli_query($conn, "INSERT INTO data_penulis VALUES(null, '$nama', '$email', '$password')");

    return mysqli_affected_rows($conn);
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

function cari($keyword)
{
    $query = "SELECT * FROM buku 
    WHERE 
    namaBuku LIKE '%$keyword%' OR
    penulis LIKE '%$keyword$%' OR
    genre LIKE '%$keyword$%'
    ";

    return query($query);
}

function uploadFile()
{
    $namaFile = $_FILES['bookFile']['name'];
    $ukuranFile = $_FILES['bookFile']['size'];
    $tmpName = $_FILES['bookFile']['tmp_name'];

    $ekstensiGambarValid = ['txt', 'pdf', 'html'];
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

    move_uploaded_file($tmpName, '../files/' . $namaFile);

    return $namaFile;
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

    move_uploaded_file($tmpName, '../images/' . $namaFile);

    return $namaFile;
}

function tambahBuku($data)
{
    global $conn;

    $nama = $data["bookTitle"];
    $penulis = $data["bookAuthor"];
    $genre = $data["bookCategory"];
    $desc = $data["bookDescription"];
    $file = $data["bookFile"];

    $image = uploadBuku();
    if (!$image) {
        return false;
    }

    $file = uploadFile();
    if (!$file) {
        return false;
    }

    mysqli_query($conn, "INSERT INTO buku VALUES(null, '$nama', '$penulis', '$genre', '$desc', 0, '$image', '$file')");

    return mysqli_affected_rows($conn);
}

function ubah($data)
{
    global $conn;
    $id = $data["id"];
    $nama = htmlspecialchars($data["bookTitle"]);
    $idPenulis = htmlspecialchars($data["bookAuthor"]);
    $genre = htmlspecialchars($data["bookCategory"]);
    $desc = htmlspecialchars($data["bookDescription"]);
    $image = $data["bookImage"];
    $file = $data["bookFile"];

    $image = uploadBuku();
    if (!$image) {
        return false;
    }

    $file = uploadFile();
    if (!$file){
        return false;
    }

    $query = "UPDATE buku SET namaBuku = '$nama', id_penulis = $idPenulis, id_category = '$genre', 
    sinopsis = '$desc', gambar = '$image', file = '$file' WHERE idBuku = $id";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function count_total_book($id)
{
    $total = 0;

    $result = query("SELECT SUM(tot_pinjam) AS total FROM buku WHERE id_penulis=$id");

    foreach ($result as $row) {
        $total = $row["total"];
    }

    return $total;
}