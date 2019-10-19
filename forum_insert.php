<?php
session_start();
include('prevent_direct_access.php');
include('captcha_validation.php');
include('db_connection.php');

$title = htmlentities($_POST["title"]);
$content = htmlentities($_POST["content"]);

if(isset($_SESSION['username'])){
    $name = htmlentities($_SESSION['username']);
    $query = "INSERT INTO board (name,title,content) VALUES ('$name', '$title','$content')";
    mysqli_query($db,$query);
}
header('location: forum.php');

?>
