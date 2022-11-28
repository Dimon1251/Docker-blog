<?php
include "../config/connect.php";

$id = $_GET["id"];
if (!empty($_GET)){
    $title = $_GET['title'];
    $image = $_GET['image'];
    $content = $_GET['content'];
    $date = date("Y-m-d H:i:s");
    $db->query("UPDATE post SET title = '$title', content = '$content', image = '$image', updated_at = '$date' WHERE id = '$id'");

}

header("Location: ../admin.php");