<?php

$conn = mysqli_connect("localhost", "root", "admin", "rpl_user");

function registrasi($data)
{
    global $conn;

    $nama = stripslashes($data["name"]);
    $email = $data["email"];
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $repassword = mysqli_real_escape_string($conn, $data["re-password"]);

    $result = mysqli_query($conn, "SELECT email FROM regist WHERE email = '$email'");

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

    mysqli_query($conn, "INSERT INTO regist VALUES(null, '$nama', '$email', '$password')");

    return mysqli_affected_rows($conn);
}
