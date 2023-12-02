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


    $query = "UPDATE buku SET namaBuku = '$nama', penulis = '$penulis', genre = '$genre', 
    sinopsis = '$desc', gambar = '$image' WHERE idBuku = $id";
    mysqli_query($conn, $query);
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
    OR genre LIKE '$key'";

    return query($query);
}
