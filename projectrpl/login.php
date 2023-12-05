<?php
session_start();

if (isset($_SESSION["login"])) {
    header("Location: hpuser.php");
}

require '../functions/functions_admin.php';

if (isset($_POST["login"])) {

    $nama = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM regist WHERE nama='$nama'");

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {
            $_SESSION["login"] = true;
            $_SESSION["id"] = $row["id"];
            header("Location: hpuser.php");
            exit;
        }
    }
    $error = true;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="perpuslogin.css">
    <title>Perpustakaan Digital - Login</title>
</head>

<body>
    <div class=class="d-flex justify-content-center align-items-center">
        <form class="p-5 rounded shadow" action="" method="POST">
            <h2 class="text-center">Login</h2>
            <?php if (isset($error)) : ?>
                <div class="alert alert-warning" role="alert">
                    username / password salah!
                </div>
            <?php endif; ?>
            <label for="username" class="form-label">Username:</label>
            <input type="text" id="username" name="username" class="form-control" required>

            <label for="password" class="form-label">Password:</label>
            <input type="password" id="password" name="password" class="form-control" required>

            <button type="submit" name="login" class="btn btn-primary">Login</button>
        </form>

        <div class="register-link">
            Belum punya akun? <a href="../projectrpl/register.php">Daftar disini</a>
        </div>
    </div>
</body>

</html>