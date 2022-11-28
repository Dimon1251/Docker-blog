<?php
include "../config/connect.php";

$login = $_POST['login'];
$name = $_POST['name'];
$pass = $_POST['pass'];

if(mb_strlen($login) < 5 || mb_strlen($login) > 20) {
    echo "Incorrect login";
    exit();
}
else if(mb_strlen($name) < 3 || mb_strlen($name) > 20) {
    echo "Incorrect name";
    exit();
}
else if(mb_strlen($pass) < 5 || mb_strlen($pass) > 20) {
    echo "Incorrect password (4-20 symbol)";
    exit();
}

/*Hash password*/
/*$pass = md5($pass."a5wg14a");*/

$db->query("INSERT INTO users (login, pass, name) 
    VALUES ('$login', '$pass', '$name') ");

header("Location: ../index.php");