<?php
include "../config/connect.php";

$login = $_POST['login'];
$pass = $_POST['pass'];
$remember = $_POST['remember-me'];

/*Hash password*/
/*$pass = md5($pass."a5wg14a");*/

$result = $db->query("SELECT * FROM users
    WHERE login = '$login' AND pass = '$pass'");
$user = $result->fetchALL(2);
if (count($user) == 0) {
    echo "User not found";
    exit();
}
$user = $user[0];
if ($remember == 0) { setcookie('user', $user['name'], time() + 3600, "/"); }
else { setcookie('user', $user['name'], time() + 3600*24*30, "/"); }
header("Location: ../index.php");