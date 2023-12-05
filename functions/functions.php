<?php

$conn = mysqli_connect("localhost", "root", "admin", "rpl_user");

function registrasi($data)
{
    global $conn;

    $nama = stripslashes($data["name"]);
    $email = $data["email"];
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $repassword = mysqli_real_escape_string($conn, $data["re-password"]);

    $result = mysqli_query($conn, "SELECT email FROM data_user WHERE email = '$email'");

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

    mysqli_query($conn, "INSERT INTO data_user VALUES(null, '$nama', '$email', '$password', 10)");

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

function cari($key)
{
    $key = "%{$key}%";

    $query = "SELECT * FROM buku 
    WHERE namaBuku LIKE '$key'
    OR penulis LIKE '$key'";

    return query($query);
}

function updateUser($data)
{
    global $conn;

    $id = $data["id"];
    $nama = $data["name"];
    $email = $data["email"];
    $gambar = htmlspecialchars($data["gambar"]);

    $gambar = update();
    if (!$gambar) {
        return false;
    }

    // $file = $data["bookFile"];

    $query = "UPDATE data_user SET nama = '$nama', email='$email', gambar='$gambar' WHERE id='$id'";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function update()
{
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

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

    move_uploaded_file($tmpName, '../PP/' . $namaFile);

    return $namaFile;
}
