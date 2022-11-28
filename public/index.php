<?php
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);
    include 'config/connect.php';
    $posts = $db->query("SELECT * FROM post")->fetchALL(2);
?>

<!doctype html>і
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blog</title>
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

<body>

<main>
    <?php
    if($_COOKIE['user'] != ''):
    ?>
    <div class="d-grid gap-2 d-md-flex justify-content-center mb-4 mb-lg-3">
        <button type="button" onclick="window.location.href = 'create-post.php';" class="btn btn-outline-secondary btn-lg px-4">Create new post</button>
    </div>
    <?php
    endif;
    foreach ($posts as $post) {
    ?>
    <div class="container my-5">
        <div class="row p-4 pb-0 pe-lg-0 pt-lg-5 align-items-center rounded-3 border shadow-lg">
            <div class="col-lg-7 p-3 p-lg-5 pt-lg-3">
                <h1 class="display-4 fw-bold lh-1"><?php echo $post["title"] ?></h1>
                <p class="lead"><?php echo $post["content"] ?></p>
                <div class="d-grid gap-2 d-md-flex justify-content-md-start mb-4 mb-lg-3">
                    <p class="lead">Created: <?php echo $post["created_at"] ?></p>
                    <p class="lead">Updated: <?php echo $post["updated_at"] ?></p>
                </div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-start mb-4 mb-lg-3">
                    <button type="button" onclick="window.location.href = 'review-onepost.php?id=<?php echo $post["id"]; ?>';" class="btn btn-outline-secondary btn-lg px-4">View</button>
                </div>
            </div>
            <div class="col-lg-4 offset-lg-1 p-0 overflow-hidden shadow-lg">
                <img class="rounded-lg-3" src="<?php echo $post["image"] ?>" alt="" width="720">
            </div>
        </div>
    </div>
<?php } ?>
</main>

<footer>
    <div class="container">
        <footer class="py-3 my-4">
            <ul class="nav justify-content-center border-bottom pb-3 mb-3">
                <li class="nav-item"><a href="admin.php" class="nav-link px-2 text-muted">Admin panel</a></li>
            </ul>
            <p class="text-center text-muted">© 2022 Company, Inc</p>
        </footer>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
