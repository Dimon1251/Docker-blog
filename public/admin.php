<?php
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);
require ("config/connect.php");
$posts = $db->query("SELECT * FROM post")->fetchALL(2);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin panel</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/heroes/">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <style>
        .post {
            display: flex;
        }
        .area {
            display: flex;
            flex-direction: column;
            margin: 10px;
        }
        .btns{
            margin: auto;
            width: 100px;
            height: 30px;
        }
        .title{
            justify-content: center;
        }
    </style>
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
    <h1 style="margin: 30px 150px">Admin panel</h1>
    <main>
        <section class="posts">
            <h2 style="margin: 0 150px">Posts</h2>
            <div class="container d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom" >
                <?php foreach ($posts as $post) { ?>
                    <form action="vendor/update-post.php" class="post">
                        <input hidden type="text" name="id" value="<?= $post['id']; ?>">

                        <img src="<?= $post['image']; ?>" alt="photo" width="200px" height="100%">
                        <div class = "area">
                            <label>Image link</label>
                            <input type="text" name="image" value="<?= $post['image']; ?>">
                        </div>
                        <div class = "area">
                            <label>Title</label>
                            <input type="text" name="title" value="<?= $post['title']; ?>">
                        </div>
                        <div class = "area">
                            <label>Description</label>
                            <textarea style="width: 400px; height: 150px;" name="content"><?= $post['content']; ?></textarea>
                        </div>
                        <button class ="btns">Update</button>
                        <button class ="btns" type="button" onclick="window.location.href = 'vendor/delete-post.php?id=<?php echo $post["id"]; ?>';" >Delete</button>
                    </form>
                <?php }?>
            </div>
        </section>
    </main>
</body>
</html>
