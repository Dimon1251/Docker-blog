<?php
include "../config/connect.php";

$id = $_GET["id"];
if (!empty($_GET)){

    $db->query("DELETE FROM post WHERE id = '$id'");

}

header("Location: ../admin.php");
