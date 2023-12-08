<?php

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Online Library Management System in PHP</title>
    <link rel="canonical" href="">
    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <!-- Favicons -->
    <meta name="theme-color" content="#7952b3">
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
</head>

<body>
    <main>
        <div class="container py-4">

            <div class="p-5 mb-4 bg-light rounded-3">
                <div class="container-fluid py-5">
                    <h1 class="display-5 fw-bold">Library Management System</h1>
                    <p class="fs-4">This is simple Library Management System which use for maintain the record of the library. This Library Managment System has been made by using PHP script, MySQL Database, Bootstrap 5 framework and some Javascript. This is our RPL Project on Online Library Management System.</p>
                </div>
            </div>

            <div class="row align-items-md-stretch mt-4">
                <div class="col-md-6">
                    <div class="h-100 p-5 text-white bg-dark rounded-3">
                        <h2>Admin Login</h2>
                        <p></p>
                        <a href="projectrpl/login.php" class="btn btn-outline-light">Admin Login</a>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="h-100 p-5 bg-light border rounded-3">
                        <h2>User Login</h2>
                        <p></p>
                        <a href="projectrplUser/login.php" class="btn btn-outline-primary">User Login</a>
                    </div>
                </div>
            </div>

            <div class="row align-items-md-stretch justify-content-center mt-4">
                <div class="col-md-6">
                    <div class="h-100 p-5 text-white bg-info rounded-3">
                        <h2>Penulis Login</h2>
                        <p></p>
                        <a href="projectrplPENULIS/login.php" class="btn btn-outline-light">Penulis Login</a>
                    </div>
                </div>
            </div>

        </div>
</body>
</main>

<footer class="py-4 bg-light mt-auto">
    <div class="container-fluid px-4">
        <div class="d-flex align-items-center justify-content-between small">
            <div class="text-muted">Copyright &copy; Library Management System </div>
            <div>
                <a href="#">Privacy Policy</a>
                &middot;
                <a href="#">Terms &amp; Conditions</a>
            </div>
        </div>
    </div>
</footer>