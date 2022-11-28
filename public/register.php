<?php
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);
include 'config/connect.php';

?>

<!doctype html>і
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Auth</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/heroes/">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<header class="container d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
    <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
        <h1 class="display-5 fw-bold">Blog</h1>
    </a>
    <?php
    if($_COOKIE['user'] == ''):
        ?>
        <div class="col-md-3 text-end">
            <button type="button"  onclick="window.location.href = 'login.php';" class="btn btn-outline-primary me-2">Login</button>
            <button type="button" onclick="window.location.href = 'register.php';" class="btn btn-primary">Sign-up</button>
        </div>
    <?php
    endif;
    if($_COOKIE['user'] != ''):
        ?>
        <div class="col-md-3 text-end">
            <button type="button" onclick="window.location.href = 'vendor/exit.php';" class="btn btn-outline-primary me-2">Sign out</button>
            <a class="btn btn-pr imary btn-lg px-4 me-md-2"><?php echo $_COOKIE['user']?></a>
        </div>
    <?php
    endif;
    ?>

</header>
<body class="text-center bg-light">
<main class="form-signin w-100 m-auto" style="max-width: 300px">
    <form action="vendor/check.php" method="post">
        <h1 class="h3 mb-3 fw-normal">Please create account</h1>

        <div class="form-floating">
            <input type="text" class="form-control" name="login" placeholder="Login">
            <label for="floatingInput">Login</label>
        </div>
        <div class="form-floating">
            <input type="text" class="form-control" name="name" placeholder="Name">
            <label for="floatingInput">Name</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" name="pass" placeholder="Password">
            <label for="floatingPassword">Password</label>
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Create</button>
    </form>
</main>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
