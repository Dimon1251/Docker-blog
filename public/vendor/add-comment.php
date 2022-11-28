<?php
include "../config/connect.php";

if (!empty($_GET)){
    $id = $_GET['id'];
    $comment = $_GET['comment'];
    $date = date("Y-m-d H:i:s");
    $author = $_COOKIE['user'];

    $db->query("INSERT INTO comment (post_id, author, text, created_at)
        VALUES ('$id', '$author', '$comment', '$date') ");

}
header("Location: ../review-onepost.php?id=$id");