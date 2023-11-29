<?php
require '../functions/functions.php';

if (isset($_POST["login"])) {

    $nama = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM regist WHERE nama='$nama'");

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {
            header("Location: hpuser.html");
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
    <link rel="stylesheet" href="perpuslogin.css">
    <title>Perpustakaan Digital - Login</title>
</head>

<body>
    <div class="container">
        <form class="login-form" action="" method="POST">
            <h2>Login</h2>
            <?php if (isset($error)) : ?>
                <p style="color: red; font-style: italic;">username / password salah</p>
            <?php endif; ?>
            <input type="hidden" name="id" value="<?= $usr["email"]; ?>">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <div class="forgot-password">
                <a href="#">Lupa Kata Sandi?</a>
            </div>

            <button type="submit" name="login">Login</button>
        </form>

        <div class="register-link">
            Belum punya akun? <a href="../projectrpl/register.php">Daftar disini</a>
        </div>
    </div>
</body>

</html>