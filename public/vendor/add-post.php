<?php
include "../config/connect.php";

if (!empty($_GET)){
    $title = $_GET['title'];
    $image = $_GET['image'];
    $content = $_GET['content'];
    $date = date("Y-m-d H:i:s");
    $db->query("INSERT INTO post (title, content, image, created_at, updated_at) 
    VALUES ('$title', '$content', '$image', '$date', '$date') ");

}

header("Location: ../index.php");