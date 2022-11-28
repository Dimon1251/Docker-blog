<?php
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);
    include 'config/connect.php';
    $id = $_GET["id"];
    $post = $db->query("SELECT * FROM post WHERE id=$id")->fetchALL(2);

    if (count($post) > 0) {
        $post = $post[0];
    }

    $comments = $db->query("SELECT * FROM comment")->fetchALL(2);
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
    <h1 class="visually-hidden">Heroes examples</h1>
        <div class="container col-xxl-8 px-4 py-5">
            <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
                <div class="col-10 col-sm-8 col-lg-6">
                    <img src="<?php echo $post["image"] ?>" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700" height="500" loading="lazy">
                </div>
                <div class="col-lg-6">
                    <h1 class="display-5 fw-bold lh-1   mb-3"><?php echo $post["title"] ?></h1>
                    <p class="lead"><?php echo $post["content"] ?></p>
                    <p class="lead">Created: <?php echo $post["created_at"] ?></p>
                    <p class="lead">Updated: <?php echo $post["updated_at"] ?></p>
                </div>
            </div>
        </div>

    <section style="background-color: #eee;">
        <?php foreach ($comments as $comment) {
            if ($post["id"] == $comment["post_id"]){
            ?>
        <div class="container my-2 py-2">
            <div class="row d-flex justify-content-center">
                <div class="col-md-12 col-lg-10 col-xl-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-start align-items-center">
                                <div>
                                    <h6 class="fw-bold text-primary mb-1"><?php echo $comment['author']?></h6>
                                </div>
                            </div>
                            <p class="mt-3 mb-4 pb-2">
                                <?php echo $comment['text']?>
                            </p>
                            <p class="mt-3 mb-4 pb-2">
                                <?php echo $comment['created_at']?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php }}?>

        <div class="container my-3 py-3">
            <div class="row d-flex justify-content-center">
                <div class="col-md-12 col-lg-10 col-xl-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-start align-items-center">
                                <div>
                                    <h6 class="fw-bold text-primary mb-1"><?= $_COOKIE['user']; ?></h6>
                                </div>
                            </div>
                            <form action="vendor/add-comment.php">
                                <div class="d-flex flex-start w-100">
                                    <div class="form-outline w-100">
                                        <input hidden type="text" name="id" value="<?= $post['id']; ?>">
                                        <textarea class="form-control" name="comment" rows="4"
                                              style="background: #fff;"></textarea>
                                    </div>
                                </div>
                                <div class="float-end mt-2 pt-1">
                                    <button type="submit" class="btn btn-primary btn-sm">Post comment</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>

